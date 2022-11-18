<?php

namespace App\Http\Controllers\Admin\Repairs;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Filters\RepairFilter;
use App\Http\Requests\Applications\ApplicationFilterRequest;
use App\Http\Requests\Applications\UpdateApplicationFromRequest;
use App\Http\Requests\Repairs\RepairFilterRequest;
use App\Http\Requests\Repairs\UpdateRepairFormRequest;
use App\Models\Applications\Applications;
use App\Models\Applications\ApplicationStatuses;
use App\Models\Repairs\Repair;
use App\Models\Repairs\RepairStatuses;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Services\Applications\UploadService;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(RepairFilterRequest $request)
    {
        $data = $request->validate([
            'trk_id' => '',
            'repair_status_id' => '',
            'comment' => '',
            'service_id' => '',
            'created_at' => '',
        ]);

        $filter = app()->make(RepairFilter::class, ['queryParams' => array_filter($data)]);
        $repairs = Repair::filter($filter)->with(['trk', 'repair_status', 'service'])->paginate(config('admin.repair.pagination'));

        return view('admin.repairs.index', [
            'repairs' => $repairs,
            'repairs_count' => Repair::count(),
            'trks' => Trk::all(),
            'repair_statuses' => RepairStatuses::all(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.repairs.create',[
            'trks' => Trk::all(),
            'repair_statuses' => RepairStatuses::all(),
        ]);
    }

    public function store(Request $request, UploadService $uploadService)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'repair_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
        ]);

        Repair::create($data);
        return redirect()->route('admin.repairs.index');
    }

    public function show(Repair $repair)
    {
        return view('admin.repairs.show',[
            'repair' => $repair
        ]);
    }

    public function edit(Repair $repair)
    {
        return view('admin.repairs.edit', [
            'repair' => $repair,
            'trks' => Trk::all(),
            'repair_statuses' => RepairStatuses::all(),
            'services' => Service::all(),
            'users' => User::all(),
        ]);
    }

    public function update(Repair $repair, UpdateRepairFormRequest $request)
    {
        $data = $request->validated();
        $repair->update($data);
        return redirect()->route('admin.repairs.show', $repair->id);
    }

    public function destroy(Repair $repair)
    {
        $repair->delete();
        return redirect()->route('admin.repairs.index');
    }

}

