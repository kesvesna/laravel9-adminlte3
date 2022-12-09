<?php

namespace App\Http\Controllers\Admin\Trks;

use App\Http\Filters\Trks\TrkRoomNamesFilter;
use App\Http\Filters\Trks\TrksFilter;
use App\Http\Requests\Trks\TrkFilterRequest;
use App\Models\TrkBuildingFloorRooms\TrkBuildingFloorRoom;
use App\Http\Controllers\Controller;
use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use App\Models\Trks\Trk;
use App\Models\Towns\Town;
use App\Models\Rooms\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'name' => ['required', 'string', 'min:2', 'max:50'],
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
    public function show(Trk $trk, TrkFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(TrkRoomNamesFilter::class, ['queryParams' => array_filter($data)]);
        $rooms = Room::filter($filter)->pluck('id')->all();

        $filter = app()->make(TrksFilter::class, ['queryParams' => array_filter($data)]);

        $architectures = TrkBuildingFloorRoom::filter($filter)
            ->with('building', 'floor', 'room')
            ->orderBy('created_at', 'desc')
            ->whereIn('room_id', $rooms)
            ->where('trk_id', $trk->id)
            ->paginate(config('admin.trks.pagination'));

        return view('admin.trks.show',[
            'trk' => $trk,
            'architectures' => $architectures,
            'buildings' => Building::all()->sortBy('name', SORT_NATURAL, true),
            'floors' => Floor::all()->sortBy('name', SORT_NATURAL, true),
            'rooms' => Room::all()->sortBy('name', SORT_NATURAL, true),
            'old_filters' => $data,
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
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'town_id' => ['required', 'integer', 'min:1']
        ]);
        if($trk->update($data)) {
            Session::flash('message', 'Данные трк обновлены');
            return redirect()->route('admin.trks.show', $trk->id);
        }
        Session::flash('message', 'Данные трк НЕ обновлены');
        return view('admin.trks.edit', [
            'trk' => $trk,
            'towns' => Town::all()
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trks\Trk  $trk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trk $trk)
    {
        TrkBuildingFloorRoom::where('trk_id', $trk->id)->delete();
        $trk->delete();
        return redirect()->route('admin.trks.index');
    }

    public function getTrksByTown(Town $town)
    {
        $trks = Trk::with('town')->where('town_id', $town->id)->paginate(config('admin.trks.pagination'));
        return view('admin.trks.get_trks_by_town', [
            'trks' => $trks
        ]);
    }
}
