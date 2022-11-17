<?php

namespace App\Http\Controllers\Front\Applications;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\Applications\ApplicationFilterRequest;
use App\Http\Requests\Applications\AppointApplicationFormRequest;
use App\Http\Requests\Applications\RedirectApplicationFormRequest;
use App\Http\Requests\Applications\RejectApplicationFormRequest;
use App\Http\Requests\Applications\StoreApplicationFormRequest;
use App\Http\Requests\Applications\UpdateApplicationFromRequest;
use App\Models\Applications\ApplicationHistories;
use App\Models\Applications\ApplicationMedias;
use App\Models\Applications\Applications;
use App\Models\Services\Service;
use App\Models\Applications\ApplicationStatuses;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Services\Applications\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth']);
    }
    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ApplicationFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);
        $applications = Applications::filter($filter)
                                        ->with(['trk', 'application_status', 'service'])
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(config('front.applications.pagination'));

        return view('front.applications.index', [
            'applications' => $applications,
            'applications_count' => Applications::count(),
            'trks' => Trk::all(),
            'services' => Service::all(),
            'application_statuses' => ApplicationStatuses::all(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('front.applications.create',[
            'trks' => Trk::all(),
            'application_statuses' => ApplicationStatuses::all(),
            'services' => Service::all(),
        ]);
    }

    public function store(StoreApplicationFormRequest $request, UploadService $uploadService, Applications $application)
    {

        if($request->isMethod('post')){
            $data = $request->validated();

            if(isset($data['notify_author'])){
                $data['notify_author'] = 1;
            } else {
                $data['notify_author'] = 0;
            }

            $data['user_id'] = 1; //Auth::id();
            $data['application_status_id'] = $application::NEW; // new

            if( $id = Applications::create($data)->id ){

                $media['application_id'] = $id;
                if ($request->hasFile('files')) {
                    foreach($request->file(['files']) as $file) {
                        $media['name'] = $uploadService->uploadMedia($file);
                        ApplicationMedias::create($media);
                    }
                }

                return redirect()->route('front.applications.index');
            }
        }

        return redirect()->route('front.applications.create');
    }

    public function show(Applications $application)
    {
        return view('front.applications.show',[
            'application' => $application,
            'services' => Service::all(),
            'users' => User::all(),
        ]);
    }

    public function edit(Applications $application)
    {
        return redirect()->route('front.applications.index');
    }

    public function update(Applications $application, UpdateApplicationFromRequest $request)
    {
        return redirect()->route('front.applications.index');
    }

    public function destroy(Applications $application)
    {
        return redirect()->route('front.applications.index');
    }

    public function accept(Applications $application, ApplicationHistories $history)
    {
        $application->accept($history);
        return redirect()->route('front.applications.index');
    }

    public function redirect(RedirectApplicationFormRequest $request, Applications $application)
    {

        if($request->isMethod('post'))
        {
            $data = $request->validated();
            $data['user_id'] = 1; // Auth::id()
            $data['trk_id'] = $application->trk_id;
            $data['application_status_id'] = $application::NEW;
            $data['application_id'] = $application->id;

            $application->setStatusId($application::NEW);
            $application->setServiceId($data['service_id']);

            try {
                DB::beginTransaction();
                $application->update();
                ApplicationHistories::create($data);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }

        return redirect()->route('front.applications.index');
    }

    public function appoint(AppointApplicationFormRequest $request, Applications $application)
    {
        if($request->isMethod('post'))
        {
            $data = $request->validated();
            $data['trk_id'] = $application->trk_id;
            $data['application_status_id'] = $application::IN_PROGRESS;
            $data['service_id'] = $application->service_id;
            $data['application_id'] = $application->id;

            $application->setStatusId($application::IN_PROGRESS);

            try {
                DB::beginTransaction();
                $application->update();
                ApplicationHistories::create($data);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }

        return redirect()->route('front.applications.index');
    }


    public function reject(RejectApplicationFormRequest $request, Applications $application)
    {
        if($request->isMethod('post'))
        {
            $data = $request->validated();
            $data['user_id'] = 1; // Auth::id()
            $data['trk_id'] = $application->trk_id;
            $data['application_status_id'] = $application::REJECTED;
            $data['service_id'] = $application->service_id;
            $data['application_id'] = $application->id;

            $application->setStatusId($application::REJECTED);

            try {
                DB::beginTransaction();
                $application->update();
                ApplicationHistories::create($data);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }

        return redirect()->route('front.applications.index');
    }
}

