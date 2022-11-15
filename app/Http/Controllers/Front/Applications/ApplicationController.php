<?php

namespace App\Http\Controllers\Front\Applications;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\Applications\ApplicationFilterRequest;
use App\Models\ApplicationHistories\ApplicationHistories;
use App\Models\ApplicationMedias\ApplicationMedias;
use App\Models\Applications\Applications;
use App\Models\Services\Service;
use App\Models\ApplicationStatuses\ApplicationStatuses;
use App\Models\Trks\Trk;
use App\Services\Applications\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ApplicationFilterRequest $request)
    {
        $data = $request->validate([
            'trk_id' => '',
            'application_status_id' => '',
            'service_id' => '',
            'comment' => '',
            'created_at' => ''
        ]);

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

    public function store(Request $request, UploadService $uploadService, Applications $application)
    {

        if($request->isMethod('post')){
            $data = $request->validate([
                'trk_id' => [ 'required', 'integer', 'min:1' ],
                'service_id' => [ 'required', 'integer', 'min:1'],
                'comment' => ['required', 'string'],
                'notify_author' => ['nullable'],
                'files' => ['nullable', 'max:15000'] // 10mb all files size
            ]);

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
            'application' => $application
        ]);
    }

    public function edit(Applications $application)
    {
        return view('front.applications.edit', [
            'applications' => $application,
            'trks' => Trk::all(),
            'application_statuses' => ApplicationStatuses::all(),
            'application_services' => Service::all(),
        ]);
    }

    public function update(Applications $application, Request $request)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'application_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
            'service_id' => [ 'required', 'integer', 'min:1'],
            'notice_author' => [],
        ]);
        $application->update($data);
        return redirect()->route('front.applications.show', $application->id);
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

    public function redirect(Request $request)
    {

        return redirect()->route('front.applications.index');
    }

    public function appoint(Request $request)
    {

        return redirect()->route('front.applications.index');
    }


    public function reject(Request $request)
    {

        return redirect()->route('front.applications.index');
    }


}

