<?php

namespace App\Http\Controllers\Admin\Floors;

use App\Http\Controllers\Controller;
use App\Models\Floors\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.floors.index', [
            'floors' => Floor::paginate(config('admin.floors.pagination')),
            'floors_count' => Floor::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.floors.create');
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
        Floor::create($data);
        return redirect()->route('admin.floors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buildings\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        return view('admin.floors.show',[
            'floor' => $floor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buildings\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        return view('admin.floors.edit', [
            'floor' => $floor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buildings\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'sort_order' => ['integer']
        ]);
        $floor->update($data);
        return redirect()->route('admin.floors.show', $floor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buildings\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        $floor->delete();
        return redirect()->route('admin.floors.index');
    }
}
