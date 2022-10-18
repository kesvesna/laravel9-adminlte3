<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\Applications\ApplicationFilterRequest;
use App\Models\Applications\Applications;
use App\Models\Trks\Trk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApplicationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ApplicationFilterRequest $request)
    {
        $data = $request->validate([
            'trk_id' => '',
            'comment' => ''
        ]);

        $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);
        $applications = Applications::filter($filter)->with('trk')->paginate(config('admin.applications.pagination'));

        return view('admin.applications.index', [
            'applications' => $applications,
            'applications_count' => Applications::count(),
            'trks' => Trk::all(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.applications.create',[
            'trks' => Trk::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
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
            'trks' => Trk::all()
        ]);
    }

    public function update(Applications $application, Request $request)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
        ]);
        $application->update($data);
        return redirect()->route('admin.applications.show', $application->id);
    }

    public function destroy(Applications $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index');
    }

}

