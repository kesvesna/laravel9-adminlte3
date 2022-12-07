<?php

namespace App\Http\Controllers\Front\Acts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Acts\StoreActFormRequest;
use App\Models\Acts\Act;
use App\Models\Acts\ActEquipments;
use App\Models\Acts\ActMedias;
use App\Models\Acts\ActUsers;
use App\Models\Acts\ActWorks;
use App\Models\Acts\ActWorkSpareParts;
use App\Models\Applications\ApplicationHistories;
use App\Models\Applications\ApplicationRepairAct;
use App\Models\Applications\Applications;
use App\Models\Buildings\Building;
use App\Models\Equipments\Equipment;
use App\Models\Repairs\Repair;
use App\Models\Rooms\Room;
use App\Models\SpareParts\SparePart;
use App\Models\Systems\System;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Models\WorkTypes\WorkType;
use App\Services\Acts\UploadService;
use Illuminate\Support\Facades\DB;

class ActController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $acts = Act::orderBy('created_at', 'desc')
                        ->with('trk', 'system', 'equipment')
                        ->paginate(config('front.acts.pagination'));

        return view('front.act.index',[
            'acts' => $acts,
            'trks' => Trk::all(),
            'systems' => System::all(),


        ]);
    }

    public function show(Act $act)
    {
        return view('front.act.show', [
            'act' => $act,
        ]);
    }

    public function create()
    {
        return view('front.act.create');
    }

    public function create_by_application_all_done(Applications $application)
    {
        return view('front.act.create-by-application-all-done',[
            'application' => $application,
            'systems' => System::all(),
            'buildings' => Building::all(),
            'rooms' => Room::all(),
            'equipments' => Equipment::all(),
            'spare_parts' => SparePart::all(),
            'works' => WorkType::all(),
            'users' => User::all(),
        ]);
    }

    public function create_by_application_not_completely_done(Applications $application)
    {
        return view('front.act.create-by-application-not-completely-done',[
            'application' => $application,
        ]);
    }

    public function create_by_repair_all_done(Repair $repair)
    {
        // need to close repair
        return view('front.act.create-by-repair-all-done',[
            'repair' => $repair,
        ]);
    }

    public function create_by_repair_not_completely_done(Repair $repair)
    {
        // don't close repair
        return view('front.act.create-by-repair-not-completely-done',[
            'repair' => $repair,
        ]);
    }


    public function create_by_plan()
    {
        return view('front.act.create-by-plan');
    }

    public function store(StoreActFormRequest $request, UploadService $uploadService)
    {
        if($request->isMethod('post')){

            $data = $request->validated();

            try{

                $application = Applications::find($data['application_id']);

                DB::beginTransaction();

                foreach($data['Equipment'] as $equipment_array){

                    $act = new Act();

                    if($application){
                        $act->act_type_id = Act::CREATED_BY_APPLICATION;
                    } else {
                        // TODO user message ('Can't find this application')
                        return view('front.act.create-by-application-all-done');
                    }

                    $equipment = Equipment::find($equipment_array['id']);
                    $act->date = $data['date'];
                    $act->system_type_id = $equipment->system_type_id;
                    $act->trk_id = $application->trk_id;
                    $act->building_id = $equipment->building_id;
                    $act->room_id = $equipment->room_id;
                    $act->works = $equipment_array['works'];
                    $act->remarks = $equipment_array['remarks'];
                    $act->recommendations = $equipment_array['recommendations'];
                    $act->spare_parts = $equipment_array['spare_parts'];
                    $act->save();

                    $media['act_id'] = $act->id;
                    if (isset($equipment_array['files'])) {
                        foreach($equipment_array['files'] as $file) {
                            $media['name'] = $uploadService->uploadMedia($file);
                            ActMedias::create($media);
                        }
                    }

                    ApplicationRepairAct::firstOrCreate([
                        'application_id' => $application->id,
                        'act_id' => $act->id,
                        'equipment_id' => $equipment->id,
                    ]);

                    ActEquipments::firstOrCreate([
                        'act_id' => $act->id,
                        'equipment_id' => $equipment->id
                    ]);

                    foreach($data['user_id'] as $user_id) {
                        ActUsers::firstOrCreate([
                            'act_id' => $act->id,
                            'user_id' => $user_id
                        ]);
                    }

                    foreach($equipment_array['work_ids'] as $work_type) {

                        $act_work = ActWorks::firstOrCreate([
                            'act_id' => $act->id,
                            'work_id' => $work_type['id']
                        ]);

                        foreach($work_type['spare_part_ids'] as $spare_part) {
                            ActWorkSpareParts::firstOrCreate([
                                'act_work_id' => $act_work->id,
                                'spare_part_id' => $spare_part['id'],
                                'model' => $spare_part['model'],
                                'count' => $spare_part['count'],
                                'comment' => $spare_part['comment']
                            ]);
                        }

                    }

                }

                ApplicationHistories::firstOrCreate([
                    'application_id' => $application->id,
                    'service_id' => $application->currentHistory->service->id,
                    'application_status_id' => Applications::DONE,
                    'user_id' => 1, // Auth::id
                ]);


                DB::commit();
                return redirect()->route('front.acts.index');

            } catch(\Exception $e){

                DB::rollback();
                dd($e);
            }

        }

        return view('front.act.create-by-application-all-done');
    }

    public function update()
    {
        return view('front.act.index');
    }

    public function edit()
    {
        return view('front.act.index');
    }

    public function delete()
    {
        return view('front.act.index');
    }
}

