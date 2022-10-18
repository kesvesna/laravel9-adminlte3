<?php

namespace App\Http\Controllers\Admin\Buildings;

use App\Http\Controllers\Controller;
use App\Models\Buildings\Building;
use App\Models\Trks\Trk;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.buildings.index', [
            'buildings' => Building::with('trk')->paginate(config('admin.buildings.pagination')),
            'buildings_count' => Building::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buildings.create',
        [
            'trks' => Trk::all()
        ]);
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
            'trk_id' => ['required', 'integer', 'min:1']
        ]);
        Building::create($data);
        return redirect()->route('admin.buildings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buildings\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        return view('admin.buildings.show',[
            'building' => $building
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buildings\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('admin.buildings.edit', [
            'building' => $building,
            'trks' => Trk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buildings\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'trk_id' => ['required', 'integer', 'min:1']
        ]);
        $building->update($data);
        return redirect()->route('admin.buildings.show', $building->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buildings\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('admin.buildings.index');
    }
}
