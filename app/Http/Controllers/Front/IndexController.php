<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Acts\Act;
use App\Models\Applications\ApplicationHistories;
use App\Models\Applications\Applications;
use App\Models\Applications\ApplicationStatuses;
use App\Models\Repairs\Repair;
use App\Models\Repairs\RepairHistories;
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
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
    public function index(Applications $application, Repair $repair)
    {

        $new_applications_count = count(Applications::whereRelation('currentHistory', 'application_status_id', Applications::NEW)->get());
        $in_progress_applications_count = count(Applications::whereRelation('currentHistory', 'application_status_id', Applications::IN_PROGRESS)->get());

        $repair_by_plan_count = count(Repair::whereRelation('currentHistory', 'repair_status_id', Repair::BY_PLAN)->get());
        $repair_by_application_count = count(Repair::whereRelation('currentHistory', 'repair_status_id', Repair::BY_APPLICATION)->get());

        return view('front.index', [
            'new_applications_count' => $new_applications_count,
            'in_progress_applications_count' => $in_progress_applications_count,
            'repair_by_plan_count' => $repair_by_plan_count,
            'repair_by_application_count' => $repair_by_application_count,
            'act_by_plan_count' => count(Act::where('act_type_id', Act::CREATED_BY_PLAN)->get()),
            'act_by_application_count' => count(Act::where('act_type_id', Act::CREATED_BY_APPLICATION)->get()),
        ]);
    }

}

