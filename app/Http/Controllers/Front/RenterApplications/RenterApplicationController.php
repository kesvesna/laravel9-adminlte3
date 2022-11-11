<?php

namespace App\Http\Controllers\Front\RenterApplications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RenterApplicationController extends Controller
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
        return view('front.renter_application.index');
    }

}

