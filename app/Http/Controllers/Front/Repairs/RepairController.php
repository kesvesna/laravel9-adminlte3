<?php

namespace App\Http\Controllers\Front\Repairs;

use App\Http\Controllers\Controller;
use App\Http\Filters\RepairFilter;
use App\Http\Requests\Repairs\RepairFilterRequest;
use App\Http\Requests\Repairs\StoreRepairFormRequest;
use App\Http\Requests\Repairs\UpdateRepairFormRequest;
use App\Models\Applications\Applications;
use App\Models\Repairs\Repair;
use App\Models\Repairs\RepairStatuses;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Services\Repairs\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
            ->paginate(config('front.repairs.pagination'));

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
        ]);
    }

    public function create()
    {
        return view('front.repair.create');
    }

    public function create_by_application(Applications $application): string
    {
        return view('front.repair.create_by_application',[
            'application' => $application,
        ]);
    }

    public function store(StoreRepairFormRequest $request, UploadService $uploadService, Repair $repair)
    {

        dd($repair);
        if($request->isMethod('post')){

            $data = $request->validated();
            $data['user_id'] = 1; //Auth::id();
            $data['repair_status_id'] = $repair::BY_APPLICATION; // new

            if( $id = Repair::create($data)->id ){

                $media['repair_id'] = $id;
                if ($request->hasFile('files')) {
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

}

