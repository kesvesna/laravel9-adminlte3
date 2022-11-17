<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\Applications\ApplicationFilterRequest;
use App\Http\Requests\Applications\UpdateApplicationFromRequest;
use App\Models\Repairs\Repair;
use App\Models\Repairs\RepairStatuses;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Services\Applications\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
            'comment' => ''
        ]);

        $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);
        $applications = Repair::filter($filter)->with(['trk', 'application_status'])->paginate(config('admin.applications.pagination'));

        return view('admin.applications.index', [
            'applications' => $applications,
            'applications_count' => Repair::count(),
            'trks' => Trk::all(),
            'application_statuses' => RepairStatuses::all(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.applications.create',[
            'trks' => Trk::all(),
            'application_statuses' => RepairStatuses::all(),
        ]);
    }

    public function store(Request $request, UploadService $uploadService)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'application_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
        ]);

        Repair::create($data);
        return redirect()->route('admin.applications.index');
    }

    public function show(Repair $application)
    {
        return view('admin.applications.show',[
            'application' => $application
        ]);
    }

    public function edit(Repair $application)
    {
        return view('admin.applications.edit', [
            'application' => $application,
            'trks' => Trk::all(),
            'application_statuses' => RepairStatuses::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(Repair $application, UpdateApplicationFromRequest $request)
    {
        $data = $request->validated();
        $application->update($data);
        return redirect()->route('admin.applications.show', $application->id);
    }

    public function destroy(Repair $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index');
    }

}

