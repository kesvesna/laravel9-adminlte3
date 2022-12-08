<?php

namespace App\Http\Controllers\Admin\Rooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rooms\StoreRoomFormRequest;
use App\Http\Requests\Rooms\UpdateRoomFormRequest;
use App\Models\Rooms\Room;
use App\Models\Rooms\RoomTypes;
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
            'rooms' => Room::orderBy('created_at', 'desc')->paginate(config('admin.rooms.pagination')),
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
        return view('admin.' . $this->str . '.create',[
            'room_types' => RoomTypes::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomFormRequest $request)
    {
        $data = $request->validated();
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
            'room_types' => RoomTypes::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rooms\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomFormRequest $request, Room $room)
    {
        $data = $request->validated();
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
