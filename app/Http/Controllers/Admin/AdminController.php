<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applications\Applications;
use App\Models\Applications\ApplicationStatuses;
use App\Models\Equipments\Equipment;
use App\Models\Repairs\Repair;
use App\Models\Floors\Floor;
use App\Models\Rooms\Room;
use App\Models\SpareParts\SparePart;
use App\Models\Systems\System;
use App\Models\Towns\Town;
use App\Models\Buildings\Building;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Models\UserStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    /**
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $new_applications = Applications::whereRelation('currentHistory', 'application_status_id', Applications::NEW)->get();
        $in_progress_applications = Applications::whereRelation('currentHistory', 'application_status_id', Applications::IN_PROGRESS)->get();

        $repairs_by_plan = Repair::whereRelation('currentHistory', 'repair_status_id', Repair::BY_PLAN)->get();
        $repairs_by_application = Repair::whereRelation('currentHistory', 'repair_status_id', Repair::BY_APPLICATION)->get();


        return view('admin.index', [
            'applications_count' => Applications::count(),
            'repairs_count' => Repair::count(),
            'towns_count' => Town::count(),
            'trks_count' => Trk::count(),
            'buildings_count' => Building::count(),
            'floors_count' => Floor::count(),
            'rooms_count' => Room::count(),
            'systems_count' => System::count(),
            'application_statuses_count' => ApplicationStatuses::count(),
            'equipments_count' => Equipment::count(),
            'spare_parts_count' => SparePart::count(),
            'users_count' => User::count(),
            'user_statuses_count' => UserStatuses::count(),
            'new_applications' => $new_applications,
            'in_progress_applications' => $in_progress_applications,
            'repairs_by_plan' => $repairs_by_plan,
            'repairs_by_application' => $repairs_by_application,
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}

