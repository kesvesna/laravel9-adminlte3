<?php

namespace App\Http\Controllers\Admin\Equipments;

use App\Http\Controllers\Controller;
use App\Http\Filters\Trks\TrksFilter;
use App\Http\Filters\Equipments\EquipmentHistoriesFilter;
use App\Http\Filters\Equipments\EquipmentNamesFilter;
use App\Http\Filters\Trks\TrkRoomNamesFilter;
use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use App\Models\Rooms\Room;
use App\Models\Services\Service;
use App\Models\Systems\System;
use App\Http\Requests\Equipments\{EquipmentFilterRequest, StoreEquipmentFormRequest, UpdateEquipmentFormRequest};
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

        $filter = app()->make(TrkRoomNamesFilter::class, ['queryParams' => array_filter($data)]);
        $rooms = Room::filter($filter)->pluck('id')->all();

        $filter = app()->make(TrksFilter::class, ['queryParams' => array_filter($data)]);
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

    public function store(StoreEquipmentFormRequest $request, UploadService $uploadService)
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
            'equipment' => $equipment,

        ]);
    }

    public function edit(Equipment $equipment)
    {

        return view('admin.equipments.edit', [
            'equipment' => $equipment,
            'trks' => Trk::all(),
            'buildings' => Building::all(),
            'floors' => Floor::all(),
            'rooms' => Room::all(),
            'equipment_statuses' => EquipmentStatuses::all(),
            'systems' => System::all(),
            'names' => EquipmentNames::all(),
        ]);
    }

    public function update(Equipment $equipment, UpdateEquipmentFormRequest $request)
    {
        $data = $request->validated();
        $data['created_by_user_id'] = 1; // Auth::id
        $data['equipment_id'] = $equipment->id;

        if(Equipment::where('trk_id', $data['trk_id'])
                        ->where('building_id', $data['building_id'])
                        ->where('floor_id', $data['floor_id'])
                        ->where('room_id', $data['room_id'])
                        ->where('system_type_id', $data['system_type_id'])
                        ->where('equipment_name_id', $data['equipment_name_id'])
                        ->first()
        )
        {
            session()->flash('danger', 'Такое оборудование уже существует');
            return redirect()->route('admin.equipments.edit',[
                'equipment' => $equipment,
            ]);
        }

        $equipment->fill($data);

        try{
            DB::beginTransaction();
            EquipmentHistories::create($data);
            $equipment->update();
            DB::commit();
            session()->flash('success', 'Оборудование отредактировано');
            return redirect()->route('admin.equipments.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
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

