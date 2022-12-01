<?php

namespace App\Http\Controllers\Front\Equipments;

use App\Http\Controllers\Controller;
use App\Http\Filters\Equipments\EquipmentHistoriesFilter;
use App\Http\Filters\Equipments\EquipmentNamesFilter;
use App\Http\Filters\Trks\TrkRoomNamesFilter;
use App\Http\Filters\Trks\TrksFilter;
use App\Models\Rooms\Room;
use App\Models\Systems\SparePart;
use App\Http\Requests\Equipments\{
    EquipmentFilterRequest,
    StoreUserFormRequest,
    UpdateUserFormRequest
};

use App\Models\Equipments\{EquipmentHistories, EquipmentMedias, Equipment, EquipmentNames, EquipmentStatuses};

use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Services\Applications\UploadService;
use Illuminate\Support\Facades\App;
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

        //$filter = app()->make(EquipmentHistoriesFilter::class, ['queryParams' => array_filter($data)]);
        //$histories = EquipmentHistories::filter($filter)->pluck('equipment_id')->all();

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
                                        ->paginate(config('front.equipments.pagination'));

        return view('front.equipment.index', [
            'equipments' => $equipments,
            'trks' => Trk::all(),
            'systems' => SparePart::all(),
            'rooms' => Room::all(),
            'equipment_names' => EquipmentNames::all(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('front.equipment.index', [
        ]);
    }

    public function store(StoreUserFormRequest $request, UploadService $uploadService)
    {
        return redirect()->route('front.equipment.index');
    }

    public function show(Equipment $equipment)
    {
        return view('front.equipment.show',[
            'equipment' => $equipment
        ]);
    }

    public function edit(Equipment $equipment)
    {
        return redirect()->route('front.equipment.index');
    }

    public function update(Equipment $equipment, UpdateUserFormRequest $request)
    {
        return redirect()->route('front.equipment.index');
    }

    public function destroy(Equipment $equipment)
    {
        return redirect()->route('front.equipment.index');
    }
}

