<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Applications\ApplicationHistories;
use App\Models\Applications\Applications;
use App\Models\Repairs\Repair;
use App\Models\Repairs\RepairHistories;

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
        return view('front.index', [
            'new_applications_count' => count(ApplicationHistories::where('application_status_id', $application::NEW)->get()),
            'in_progress_applications_count' => count(ApplicationHistories::where('application_status_id', $application::IN_PROGRESS)->get()),
            'repair_by_plan_count' => count(RepairHistories::where('repair_status_id', $repair::BY_PLAN)->get()),
            'repair_by_application_count' => count(RepairHistories::where('repair_status_id', $repair::BY_APPLICATION)->get())
        ]);
    }

}

