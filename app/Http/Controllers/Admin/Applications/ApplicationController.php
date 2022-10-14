<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Applications\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApplicationController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.applications.index', [
            'applications' => Applications::paginate(config('admin.applications.pagination')),
            'applications_count' => Applications::count()
        ]);
    }

    public function create()
    {
        return view('admin.applications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'trk_id' => 'required',
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
            'application' => $application
        ]);
    }

    public function update(Applications $application, Request $request)
    {
        $data = $request->validate([
            'trk_id' => 'required',
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

