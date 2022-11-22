<?php

namespace App\Http\Controllers\Admin\Systems;

use App\Http\Controllers\Controller;
use App\Models\Systems\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.systems.index', [
            'systems' => System::paginate(config('admin.systems.pagination')),
            'systems_count' => System::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.systems.create');
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
        System::create($data);
        return redirect()->route('admin.systems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Systems\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        return view('admin.systems.show',[
            'system' => $system
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Systems\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System  $system)
    {
        return view('admin.systems.edit', [
            'system' => $system
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Systems\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, System  $system)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'sort_order' => ['integer']
        ]);
        $system->update($data);
        return redirect()->route('admin.systems.show', $system->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Systems\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System  $system)
    {
        $system->delete();
        return redirect()->route('admin.systems.index');
    }
}
