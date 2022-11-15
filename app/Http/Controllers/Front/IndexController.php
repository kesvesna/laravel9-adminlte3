<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Applications\Applications;
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
    public function index()
    {
        return view('front.index', [
            'new_applications_count' => count(Applications::where('application_status_id', 1)->get()),
            'in_progress_applications_count' => count(Applications::where('application_status_id', 2)->get())
        ]);
    }

}

