<?php

namespace App\Http\Controllers\Admin\Rooms;

use App\Http\Controllers\Controller;
use App\Models\Buildings\Building;
use App\Models\Rooms\Room;
use App\Models\Trks\Trk;
use App\Models\Floors\Floor;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $str;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rooms.index', [
            'rooms' => Room::with(['trk', 'building', 'floor'])->paginate(config('admin.rooms.pagination')),
            'rooms_count' => Room::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->str = 'rooms';
        return view('admin.' . $this->str . '.create',
            [
                'trks' => Trk::all(),
                'buildings' => Building::all(),
                'floors' => Floor::all(),
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
            'trk_id' => ['required', 'integer', 'min:1'],
            'building_id' => ['required', 'integer', 'min:1'],
            'floor_id' => ['required', 'integer', 'min:1']
        ]);
        Room::create($data);
        return redirect()->route('admin.rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rooms\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('admin.rooms.show',[
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rooms\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', [
            'room' => $room,
            'trks' => Trk::all(),
            'buildings' => Building::all(),
            'floors' => Floor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rooms\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'trk_id' => ['required', 'integer', 'min:1'],
            'building_id' => ['required', 'integer', 'min:1']
        ]);
        $room->update($data);
        return redirect()->route('admin.rooms.show', $room->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index');
    }
}
