<?php

namespace App\Http\Controllers\Front\Applications;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\Applications\ApplicationFilterRequest;
use App\Models\Applications\Applications;
use App\Models\Services\Service;
use App\Models\ApplicationStatuses\ApplicationStatuses;
use App\Models\Trks\Trk;
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
            'comment' => ''
        ]);

        $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);
        $applications = Applications::filter($filter)->with(['trk', 'application_status', 'service'])->paginate(config('front.applications.pagination'));

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
            'application_services' => Service::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'application_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
            'service_id' => [ 'required', 'integer', 'min:1'],
            'notice_author' => [],
        ]);
        $data['user_id'] = Auth::id();
        Applications::create($data);
        return redirect()->route('front.applications.index');
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
        $application->delete();
        return redirect()->route('front.applications.index');
    }

}

