<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repairs\Repair;
use App\Models\Floors\Floor;
use App\Models\Rooms\Room;
use App\Models\Towns\Town;
use App\Models\Buildings\Building;
use App\Models\Trks\Trk;
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
        return view('admin.index', [
            'applications_count' => Repair::count(),
            'towns_count' => Town::count(),
            'trks_count' => Trk::count(),
            'buildings_count' => Building::count(),
            'floors_count' => Floor::count(),
            'rooms_count' => Room::count(),
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

