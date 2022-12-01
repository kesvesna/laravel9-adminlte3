<?php

namespace App\Http\Controllers\Front\Acts;

use App\Http\Controllers\Controller;
use App\Models\Applications\Applications;
use App\Models\Buildings\Building;
use App\Models\Repairs\Repair;
use App\Models\Rooms\Room;
use App\Models\Systems\System;

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
        return view('front.act.index');
    }

    public function show()
    {
        return view('front.act.show');
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

