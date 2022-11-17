<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Applications\Repair;
use Illuminate\Http\Request;

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
    public function index(Repair $application)
    {
        return view('front.index', [
            'new_applications_count' => count(Repair::where('application_status_id', $application::NEW)->get()),
            'in_progress_applications_count' => count(Repair::where('application_status_id', $application::IN_PROGRESS)->get())
        ]);
    }

}

