<?php

namespace App\Http\Controllers\Admin\Equipments;

use App\Http\Controllers\Controller;
use App\Http\Filters\Equipments\EquipmentFilter;
use App\Http\Filters\Equipments\EquipmentHistoriesFilter;
use App\Http\Filters\Equipments\EquipmentNamesFilter;
use App\Http\Filters\Equipments\EquipmentRoomsFilter;
use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use App\Models\Rooms\Room;
use App\Models\Systems\System;
use App\Http\Requests\Equipments\{
    EquipmentFilterRequest,
    StoreUserFormRequest,
    UpdateUserFormRequest
};
use App\Models\Equipments\{Equipment, EquipmentHistories, EquipmentNames, EquipmentStatuses};
use App\Models\Trks\Trk;
use App\Services\Equipments\UploadService;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth']);
    }
    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(EquipmentFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(EquipmentNamesFilter::class, ['queryParams' => array_filter($data)]);
        $names = EquipmentNames::filter($filter)->pluck('id')->all();

        $filter = app()->make(EquipmentRoomsFilter::class, ['queryParams' => array_filter($data)]);
        $rooms = Room::filter($filter)->pluck('id')->all();

        $filter = app()->make(EquipmentFilter::class, ['queryParams' => array_filter($data)]);
        $equipments = Equipment::filter($filter)
                                        ->with(['trk', 'histories', 'currentHistory', 'system', 'name', 'room'])
                                        ->orderBy('id', 'desc')
                                        ->whereIn('equipment_name_id', $names)
                                        ->whereIn('room_id', $rooms)
                                        ->paginate(config('admin.equipments.pagination'));

        return view('admin.equipments.index', [
            'equipments' => $equipments,
            'trks' => Trk::all(),
            'systems' => System::all(),
            'rooms' => Room::all(),
            'equipment_names' => EquipmentNames::all(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.equipments.create', [
            'trks' => Trk::all(),
            'buildings' => Building::all(),
            'floors' => Floor::all(),
            'systems' => System::all(),
            'rooms' => Room::all(),
            'equipment_names' => EquipmentNames::all(),
            'equipment_statuses' => EquipmentStatuses::all(),

        ]);
    }

    public function store(StoreUserFormRequest $request, UploadService $uploadService)
    {
        if($request->isMethod('post'))
        {
            $data = $request->validated();

            try {
                DB::beginTransaction();
                $equipment = Equipment::create($data);

                $data['created_by_user_id'] = 1; // Auth::id
                $data['equipment_id'] = $equipment->id;

                $history = EquipmentHistories::create($data);
                DB::commit();
            } catch(\Exception $e){
                DB::rollBack();
                dd($e);
            }
            return redirect()->route('admin.equipments.index');
        }
        return redirect()->route('admin.equipments.create');
    }

    public function show(Equipment $equipment)
    {
        return view('admin.equipments.show',[
            'equipment' => $equipment
        ]);
    }

    public function edit(Equipment $equipment)
    {
        return redirect()->route('admin.equipments.index');
    }

    public function update(Equipment $equipment, UpdateUserFormRequest $request)
    {
        return redirect()->route('admin.equipments.index');
    }

    public function destroy(Equipment $equipment)
    {
        try{
            DB::beginTransaction();
            $equipment->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return redirect()->route('admin.equipments.index');
    }
}

