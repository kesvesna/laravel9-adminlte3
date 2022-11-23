<?php

namespace App\Http\Controllers\Admin\Applications;

use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Applications\Applications;
use App\Models\Applications\ApplicationStatuses;
use App\Http\Requests\Application_statuses\StoreApplicationStatusFormRequest;
use App\Http\Requests\Application_statuses\UpdateApplicationStatusFormRequest;

class ApplicationStatusController extends Controller
{
    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.application_statuses.index', [
            'application_statuses' => ApplicationStatuses::paginate(config('admin.application_statuses.pagination')),
            'applications_count' => Applications::count(),
            'application_statuses_count' => ApplicationStatuses::where('visible', 1)->count(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create() : View
    {
        return view('admin.application_statuses.create');
    }

    public function store(StoreApplicationStatusFormRequest $request, ApplicationStatuses $application_status)
    {
        if($request->isMethod('post')){

            $application_status->fill($request->validated());
            $application_status['visible'] = $request->input('visible') ? 1 : 0;
            $application_status['slug'] = Str::slug($request->name);

            if($application_status->save())
            {
                return redirect()->route('admin.application_statuses.show', $application_status->id);
            }
        }
        return redirect()->route('admin.application_statuses.create');
    }

    public function show(ApplicationStatuses $application_status)
    {
        return view('admin.application_statuses.show',[
            'application_status' => $application_status
        ]);
    }

    public function edit(ApplicationStatuses $application_status)
    {
        return view('admin.application_statuses.edit', [
            'application_status' => $application_status,
            'application_statuses' => ApplicationStatuses::all(),
        ]);
    }

    public function update(ApplicationStatuses $application_status, UpdateApplicationStatusFormRequest $request)
    {
        if($request->isMethod('patch')){

            $application_status->fill($request->validated());
            $application_status['visible'] = $request->input('visible') ? 1 : 0;

            if($application_status->update())
            {
                return redirect()->route('admin.application_statuses.show', $application_status->id);
            }
        }
        return redirect()->route('admin.application_statuses.show', $application_status->id);
    }

    public function destroy(ApplicationStatuses $application_status)
    {
        $application_status->delete();
        return redirect()->route('admin.application_statuses.index');
    }

}

