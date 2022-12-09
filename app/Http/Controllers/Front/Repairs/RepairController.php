<?php

namespace App\Http\Controllers\Front\Repairs;

use App\Http\Controllers\Controller;
use App\Http\Filters\Repairs\RepairFilter;
use App\Http\Filters\Repairs\RepairHistoriesFilter;
use App\Models\Applications\ApplicationRepairAct;
use App\Http\Requests\Repairs\{
    AppointRepairFormRequest,
    RejectRepairFormRequest,
    RepairFilterRequest,
    StoreRepairFormRequest,
    UpdateRepairFormRequest,
};

use App\Models\Repairs\{
    Repair,
    RepairHistories,
    RepairMedias,
    RepairStatuses,
};

use App\Models\Applications\Applications;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Services\Repairs\UploadService;
use Illuminate\Support\Facades\DB;

class RepairController extends Controller
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
    public function index(RepairFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(RepairHistoriesFilter::class, ['queryParams' => array_filter($data)]);
        $histories = RepairHistories::filter($filter)->pluck('repair_id')->all();

        $filter = app()->make(RepairFilter::class, ['queryParams' => array_filter($data)]);
        $repairs = Repair::filter($filter)
            ->with(['trk', 'currentHistory', 'histories'])
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $histories)
            ->paginate(config('front.repairs.pagination'));

        return view('front.repair.index', [
            'repairs' => $repairs,
            'repairs_count' => Repair::count(),
            'trks' => Trk::all(),
            'services' => Service::all(),
            'repair_statuses' => RepairStatuses::all(),
            'old_filters' => $data
        ]);
    }

    public function show(Repair $repair)
    {
        return view('front.repair.show', [
            'repair' => $repair,
            'users' => User::all(),
        ]);
    }

    public function create()
    {

        return view('front.repair.create',[
            'trks' => Trk::all(),
            'repair_statuses' => RepairStatuses::where('id', Repair::BY_PLAN)->get(),
            'services' => Service::all(),
            'users' => User::all(),
        ]);
    }

    public function create_by_application(Applications $application)
    {
        return view('front.repair.create_by_application',[
            'application' => $application,
            'trks' => Trk::all(),
            'repair_statuses' => RepairStatuses::where('id', Repair::BY_APPLICATION)->get(),
            'services' => Service::all(),
            'users' => User::all(),
        ]);
    }

    public function store(StoreRepairFormRequest $request, UploadService $uploadService)
    {

        if($request->isMethod('post')){

            $data = $request->validated();
            $data['user_id'] = 1; //Auth::id();

            if(is_null($data['application_id']))
            {
                $data['repair_status_id'] = Repair::BY_PLAN;
            } else
            {
                $data['repair_status_id'] = Repair::BY_APPLICATION;
            }

            try {
                DB::beginTransaction();

                if( $id = Repair::create($data)->id ){

                    $media['repair_id'] = $id;
                    if ($request->hasFile('files')) {
                        foreach($request->file(['files']) as $file) {
                            $media['name'] = $uploadService->uploadMedia($file);
                            RepairMedias::create($media);
                        }
                    }

                    $history['repair_status_id'] = $data['repair_status_id'];
                    $history['user_id'] = $data['user_id'];
                    $history['service_id'] = $data['service_id'];
                    $history['repair_id'] = $id;
                    $history['plan_date'] = $data['plan_date'];

                    RepairHistories::create($history);

                    $repair['repair_id'] = $id;
                    ApplicationRepairAct::create($repair);

                    DB::commit();
                    return redirect()->route('front.repair.index');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
                return redirect()->route('front.repair.create');
        }

        return redirect()->route('front.repair.create');
    }

    public function edit(Repair $repair)
    {
        return redirect()->route('front.repair.index');
    }

    public function update(Repair $repair, UpdateRepairFormRequest $request)
    {
        return redirect()->route('front.repair.index');
    }

    public function destroy(Repair $repair)
    {
        return redirect()->route('front.repair.index');
    }

    public function appoint(AppointRepairFormRequest $request, Repair $repair)
    {
        if($request->isMethod('post'))
        {
            $data = $request->validated();
            $data['repair_status_id'] = $repair::RESPONSIBLE_USER;
            $data['service_id'] = $repair->currentHistory->service_id;
            $data['repair_id'] = $repair->id;
            $data['plan_date'] = $repair->currentHistory->plan_date;
            $data['user_id'] = 1; // Auth::id

            $old_repair_status = $repair->currentHistory->repair_status_id;

            try {
                DB::beginTransaction();
                $history = RepairHistories::create($data);
                $newHistory = $history->replicate()->fill([
                    'repair_status_id' => $old_repair_status,
                    'comment' => '',
                ]);
                $newHistory->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }

        return redirect()->route('front.repair.index');
    }

    public function reject(RejectRepairFormRequest $request, Repair $repair)
    {
        if($request->isMethod('post'))
        {
            $data = $request->validated();
            $data['repair_status_id'] = $repair::REJECTED;
            $data['service_id'] = $repair->currentHistory->service_id;
            $data['repair_id'] = $repair->id;
            $data['plan_date'] = $repair->currentHistory->plan_date;
            $data['user_id'] = 1; // Auth::id

            try {

                DB::beginTransaction();

                RepairHistories::create($data);

                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }

        return redirect()->route('front.repair.index');
    }

}

