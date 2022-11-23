<?php

namespace App\Http\Controllers\Front\Applications;

use App\Http\Controllers\Controller;
use App\Http\Filters\Applications\ApplicationFilter;

use App\Http\Filters\Applications\ApplicationHistoriesFilter;
use App\Http\Requests\Applications\{
    ApplicationFilterRequest,
    AppointApplicationFormRequest,
    RedirectApplicationFormRequest,
    RejectApplicationFormRequest,
    StoreApplicationFormRequest,
    UpdateApplicationFromRequest
};

use App\Models\Applications\{
    ApplicationHistories,
    ApplicationMedias,
    Applications,
    ApplicationStatuses
};

use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Services\Applications\UploadService;
use Illuminate\Support\Facades\App;
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

        $filter = app()->make(ApplicationHistoriesFilter::class, ['queryParams' => array_filter($data)]);
        $histories = ApplicationHistories::filter($filter)->pluck('application_id')->all();

        $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);
        $applications = Applications::filter($filter)
                                        ->with(['trk', 'histories', 'currentHistory'])
                                        ->orderBy('created_at', 'desc')
                                        ->whereIn('id', $histories)
                                        ->paginate(config('front.applications.pagination'));

        return view('front.applications.index', [
            'applications' => $applications,
            'applications_count' => Applications::count(),
            'trks' => Trk::all(),
            'services' => Service::all(),
            'application_statuses' => ApplicationStatuses::where('visible', 1)->get(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('front.applications.create',[
            'trks' => Trk::all(),
            'application_statuses' => ApplicationStatuses::all(),
            'services' => Service::all()
        ]);
    }

    public function store(StoreApplicationFormRequest $request, UploadService $uploadService)
    {

        if($request->isMethod('post')){

            $data = $request->validated();
            if(isset($data['notify_author'])){
                $data['notify_author'] = 1;
            } else {
                $data['notify_author'] = 0;
            }
            $data['user_id'] = 1; //Auth::id();

            try {
                DB::beginTransaction();

                if( $id = Applications::create($data)->id ){

                    $media['application_id'] = $id;
                    if ($request->hasFile('files')) {
                        foreach($request->file(['files']) as $file) {
                            $media['name'] = $uploadService->uploadMedia($file);
                            ApplicationMedias::create($media);
                        }
                    }

                    $history['application_status_id'] = Applications::NEW;
                    $history['user_id'] = $data['user_id'];
                    $history['service_id'] = $data['service_id'];
                    $history['application_id'] = $id;

                    ApplicationHistories::create($history);

                    DB::commit();

                    return redirect()->route('front.applications.index');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
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

    public function accept(Applications $application)
    {
        $history = ApplicationHistories::where('application_id', $application->id)
            ->where('application_status_id', Applications::NEW)
            ->get()
            ->last();

        $newHistory = $history->replicate()->fill([
            'application_status_id' => Applications::IN_PROGRESS,
            'user_id' => 1,
            'comment' => ''
        ]);
        $newHistory->save();

        return redirect()->route('front.applications.index');
    }

    public function redirect(RedirectApplicationFormRequest $request, Applications $application)
    {

        if($request->isMethod('post'))
        {
            $data = $request->validated();
            $data['user_id'] = 1; // Auth::id()
            $data['application_status_id'] = $application::REDIRECTED;
            $data['application_id'] = $application->id;

            try {
                DB::beginTransaction();
                $history = ApplicationHistories::create($data);
                $newHistory = $history->replicate()->fill([
                    'application_status_id' => Applications::NEW,
                    'comment' => '',
                ]);
                $newHistory->save();
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
            $data['application_status_id'] = $application::RESPONSIBLE_USER;
            $data['service_id'] = $application->currentHistory->service->id;
            $data['application_id'] = $application->id;
            $data['user_id'] = 1; // Auth::id

            try {
                DB::beginTransaction();
                $history = ApplicationHistories::create($data);
                $newHistory = $history->replicate()->fill([
                    'application_status_id' => Applications::IN_PROGRESS,
                    'comment' => '',
                ]);
                $newHistory->save();
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
            $data['application_status_id'] = Applications::REJECTED;
            $data['application_id'] = $application->id;
            $data['service_id'] = $application->currentHistory->service->id;

            try {
                DB::beginTransaction();
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

