<?php

namespace App\Http\Controllers\Admin\Towns;

use App\Http\Controllers\Controller;
use App\Models\Towns\Town;
use Illuminate\Http\Request;


class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.towns.index', [
            'towns' => Town::paginate(config('admin.towns.pagination')),
            'towns_count' => Town::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.towns.create');
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
            'name' => 'required',
            'slug' => 'string',
        ]);
        Town::create($data);
        return redirect()->route('admin.towns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Towns\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show(Town $town)
    {
        return view('admin.towns.show',[
            'town' => $town
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Towns\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function edit(Town $town)
    {
        return view('admin.towns.edit', [
            'town' => $town
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param  \App\Models\Towns\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Town $town)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'string',
        ]);
        $town->update($data);
        return redirect()->route('admin.towns.show', $town->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Towns\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function destroy(Town $town)
    {
        $town->delete();
        return redirect()->route('admin.towns.index');
    }
}
