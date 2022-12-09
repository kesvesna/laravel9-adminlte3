<?php

namespace App\Http\Controllers\Admin\EquipmentNames;

use App\Http\Controllers\Controller;
use App\Models\Equipments\EquipmentNames;
use Illuminate\Http\Request;

class EquipmentNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.equipment_names.index', [
            'equipment_names' => EquipmentNames::orderBy('created_at', 'desc')->paginate(config('admin.equipment_names.pagination')),
            'equipment_names_count' => EquipmentNames::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipment_names.create');
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

        EquipmentNames::firstOrCreate($data);

        return redirect()->route('admin.equipment_names.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipments\EquipmentNames  $equipment_name
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentNames $equipment_name)
    {
        return view('admin.equipment_names.show',[
            'equipment_name' => $equipment_name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipments\EquipmentNames  $equipment_name
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentNames $equipment_name)
    {
        return view('admin.equipment_names.edit', [
            'equipment_name' => $equipment_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipments\EquipmentNames  $equipment_name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,EquipmentNames $equipment_name)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'sort_order' => ['integer']
        ]);
        $equipment_name->update($data);
        return redirect()->route('admin.equipment_names.show', $equipment_name->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipments\EquipmentNames  $equipment_name
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentNames  $equipment_name)
    {
        $equipment_name->delete();
        return redirect()->route('admin.equipment_names.index');
    }
}
