<?php

namespace App\Http\Controllers\Admin\TrkBuildingFloorRooms;

use App\Http\Controllers\Controller;
use App\Models\Buildings\Building;
use App\Models\TrkBuildingFloorRooms\TrkBuildingFloorRoom;
use App\Models\Trks\Trk;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TrkBuildingFloorRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.buildings.index', [
            'buildings' => Building::paginate(config('admin.buildings.pagination')),
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
        return view('admin.buildings.create');
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
            'sort_order' => ['integer'],
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
            'building' => $building
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trks\Trk  $trk
     */
    public function update(Request $request, Trk $trk)
    {
        if($request->isMethod('post')){

            $data = $request->all();

            try{
                DB::beginTransaction();

                $rooms = [];

                foreach($data['buildings'] as $key => $value)
                {
                    if(!is_null($value) || !is_null($data['floors'][$key]) || !is_null($data['rooms'][$key])){
                        $rooms['trk_id'] = $trk->id;
                        $rooms['building_id'] = $value;
                        $rooms['floor_id'] = $data['floors'][$key];
                        $rooms['room_id'] = $data['rooms'][$key];
                        TrkBuildingFloorRoom::firstOrCreate($rooms);
                    }
                }

                DB::commit();

            } catch (\Exception $e) {

                DB::rollBack();

                dd($e);

            }
        }
        return redirect()->route('admin.trks.show', $trk->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buildings\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrkBuildingFloorRoom $trk_building_floor_room): JsonResponse
    {

        try {
            if ($trk_building_floor_room->delete()) {
                return \response()->json('ok', 200);
            }
            return \response()->json('error', 400);
        } catch (\Exception $e) {
            //Log::error('New with ID: ' . $id . ' delete error');
            //Log::error($e->getMessage());
            return \response()->json('error', 400);
        }
    }
}
