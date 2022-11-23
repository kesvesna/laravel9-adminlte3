<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Http\Filters\Applications\ApplicationFilter;
use App\Http\Filters\Applications\ApplicationHistoriesFilter;
use App\Http\Requests\Applications\ApplicationFilterRequest;
use App\Http\Requests\Applications\UpdateApplicationFromRequest;
use App\Models\Applications\ApplicationHistories;
use App\Models\Applications\ApplicationMedias;
use App\Models\Applications\Applications;
use App\Models\Applications\ApplicationStatuses;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Services\Applications\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ApplicationFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ApplicationHistoriesFilter::class, ['queryParams' => array_filter($data)]);
        $histories = ApplicationHistories::filter($filter)->pluck('application_id')->all();

        $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);
        $applications = Applications::filter($filter)
            ->with(['trk', 'histories', 'currentHistory'])
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $histories)
            ->paginate(config('admin.applications.pagination'));

        return view('admin.applications.index', [
            'applications' => $applications,
            'applications_count' => Applications::count(),
            'trks' => Trk::all(),
            'services' => Service::all(),
            'application_statuses' => ApplicationStatuses::where('visible', 1)->get(),
            'application_statuses_count' => ApplicationStatuses::where('visible', 1)->count(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.applications.create',[
            'trks' => Trk::all(),
            'application_statuses' => ApplicationStatuses::all(),
        ]);
    }

    public function store(Request $request, UploadService $uploadService)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'application_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
        ]);

        Applications::create($data);
        return redirect()->route('admin.applications.index');
    }

    public function show(Applications $application)
    {
        return view('admin.applications.show',[
            'application' => $application
        ]);
    }

    public function edit(Applications $application)
    {
        return view('admin.applications.edit', [
            'application' => $application,
            'trks' => Trk::all(),
            'application_statuses' => ApplicationStatuses::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(Applications $application, UpdateApplicationFromRequest $request)
    {
        if($request->isMethod('patch')){

            $data = $request->validated();

            $application->trk_id = $data['trk_id'];
            $application->comment = $data['comment'];

            try {
                DB::beginTransaction();

                if( $application->save() ){

                    $history['application_status_id'] = $data['application_status_id'];
                    $history['user_id'] = 1; // Auth::id
                    $history['service_id'] = $data['service_id'];
                    $history['application_id'] = $application->id;

                    ApplicationHistories::create($history);

                    DB::commit();

                    return redirect()->route('admin.applications.index');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }
        return redirect()->route('admin.applications.show', $application->id);
    }

    public function destroy(Applications $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index');
    }

}

