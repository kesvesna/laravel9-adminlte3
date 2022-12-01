<?php

namespace App\Http\Controllers\Admin\WorkTypes;

use App\Http\Controllers\Controller;
use App\Models\WorkTypes\WorkType;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.work_types.index', [
            'work_types' => WorkType::paginate(config('admin.work_types.pagination')),
            'work_types_count' => WorkType::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.work_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'sort_order' => ['integer']
        ]);
        WorkType::create($data);
        return redirect()->route('admin.work_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkTypes\WorkType  $work_type
     * @return \Illuminate\Http\Response
     */
    public function show(WorkType $work_type)
    {
        return view('admin.work_types.show',[
            'work_type' => $work_type
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpareParts\WorkType  $work_type
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkType $work_type)
    {
        return view('admin.work_types.edit', [
            'work_type' => $work_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkTypes\WorkType  $work_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkType $work_type)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'sort_order' => ['integer']
        ]);
        $work_type->update($data);
        return redirect()->route('admin.work_types.show', $work_type->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkTypes\WorkType  $work_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkType $work_type)
    {
        $work_type->delete();
        return redirect()->route('admin.work_types.index');
    }
}
