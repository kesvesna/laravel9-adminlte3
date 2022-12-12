<?php

namespace App\Http\Controllers\Admin\Repairs;


use App\Http\Requests\RepairStatuses\StoreRepairStatusFormRequest;
use App\Http\Requests\RepairStatuses\UpdateRepairStatusFormRequest;
use App\Models\Repairs\Repair;
use App\Models\Repairs\RepairStatuses;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class RepairStatusController extends Controller
{
    /**
     * Show the acts dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.repair_statuses.index', [
            'repair_statuses' => RepairStatuses::paginate(config('admin.repair_statuses.pagination')),
            'repairs_count' => Repair::count(),
            'repair_statuses_count' => RepairStatuses::where('visible', 1)->count(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create() : View
    {
        return view('admin.repair_statuses.create');
    }

    public function store(StoreRepairStatusFormRequest $request, RepairStatuses $repair_status)
    {
        if($request->isMethod('post')){

            $repair_status->fill($request->validated());
            $repair_status['visible'] = $request->input('visible') ? 1 : 0;
            $repair_status['slug'] = Str::slug($request->name);

            if($repair_status->save())
            {
                return redirect()->route('admin.repair_statuses.show', $repair_status->id);
            }
        }
        return redirect()->route('admin.repair_statuses.create');
    }

    public function show(RepairStatuses $repair_status)
    {
        return view('admin.repair_statuses.show',[
            'repair_status' => $repair_status
        ]);
    }

    public function edit(RepairStatuses $repair_status)
    {
        return view('admin.repair_statuses.edit', [
            'repair_status' => $repair_status,
            'repair_statuses' => RepairStatuses::all(),
        ]);
    }

    public function update(RepairStatuses $repair_status, UpdateRepairStatusFormRequest $request)
    {
        if($request->isMethod('patch')){

            $repair_status->fill($request->validated());
            $repair_status['visible'] = $request->input('visible') ? 1 : 0;

            if($repair_status->update())
            {
                return redirect()->route('admin.repair_statuses.show', $repair_status->id);
            }
        }
        return redirect()->route('admin.repair_statuses.show', $repair_status->id);
    }

    public function destroy(RepairStatuses $repair_status)
    {
        $repair_status->delete();
        return redirect()->route('admin.repair_statuses.index');
    }

}

