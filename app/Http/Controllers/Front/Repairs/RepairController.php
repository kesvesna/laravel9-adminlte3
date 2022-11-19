<?php

namespace App\Http\Controllers\Front\Repairs;

use App\Http\Controllers\Controller;
use App\Http\Filters\RepairFilter;
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

        $filter = app()->make(RepairFilter::class, ['queryParams' => array_filter($data)]);
        $repairs = Repair::filter($filter)
            ->with(['trk', 'repair_status', 'service'])
            ->orderBy('created_at', 'desc')
            ->paginate(config('front.repair.pagination'));

        return view('front.repair.index', [
            'repairs' => $repairs,
            'repairs_count' => Applications::count(),
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

            if( $id = Repair::create($data)->id ){
                if ($request->hasFile('files')) {
                    $media['repair_id'] = $id;
                    foreach($request->file(['files']) as $file) {
                        $media['name'] = $uploadService->uploadMedia($file);
                        RepairMedias::create($media);
                    }
                }

                return redirect()->route('front.repair.index');
            }
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
            $data['trk_id'] = $repair->trk_id;
            $data['service_id'] = $repair->service_id;
            $data['repair_id'] = $repair->id;
            $data['repair_status_id'] = $repair->repair_status_id;
            $data['user_id'] = 1; // Auth::id();

            $repair->responsible_user_id = $data['responsible_user_id'];

            try {
                DB::beginTransaction();
                $repair->update();
                RepairHistories::create($data);
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
            $data['user_id'] = 1; // Auth::id()
            $data['responsible_user_id'] = $repair->responsible_user_id; // Auth::id()
            $data['trk_id'] = $repair->trk_id;
            $data['repair_status_id'] = $repair::REJECTED;
            $data['service_id'] = $repair->service_id;
            $data['repair_id'] = $repair->id;

            $repair->repair_status_id = $repair::REJECTED;

            try {
                DB::beginTransaction();
                $repair->update();
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

