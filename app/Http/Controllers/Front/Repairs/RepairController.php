<?php

namespace App\Http\Controllers\Front\Repairs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.repair.index');
    }

    public function show()
    {
        return view('front.repair.show');
    }

    public function create()
    {
        return view('front.repair.create_by_plan');
    }

}

