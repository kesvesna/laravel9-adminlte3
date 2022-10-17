<?php

namespace App\Http\Controllers\Admin\Trks;

use App\Http\Controllers\Controller;
use App\Models\Trks\Trk;
use App\Models\Towns\Town;
use Illuminate\Http\Request;

class TrkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.trks.index', [
            'trks' => Trk::with('town')->paginate(config('admin.trks.pagination')),
            'trks_count' => Trk::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trks.create',
        [
            'towns' => Town::all()
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
            'name' => 'required',
            'town_id' => ['required', 'integer', 'min:1']
        ]);
        Trk::create($data);
        return redirect()->route('admin.trks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trks\Trk  $trk
     * @return \Illuminate\Http\Response
     */
    public function show(Trk $trk)
    {
        return view('admin.trks.show',[
            'trk' => $trk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trks\Trk  $trk
     * @return \Illuminate\Http\Response
     */
    public function edit(Trk $trk)
    {
        return view('admin.trks.edit', [
            'trk' => $trk,
            'towns' => Town::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trks\Trk  $trk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trk $trk)
    {
        $data = $request->validate([
            'name' => 'required',
            'town_id' => [ 'required', 'integer', 'min:1']
        ]);
        $trk->update($data);
        return redirect()->route('admin.trks.show', $trk->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trks\Trk  $trk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trk $trk)
    {
        $trk->delete();
        return redirect()->route('admin.trks.index');
    }
}
