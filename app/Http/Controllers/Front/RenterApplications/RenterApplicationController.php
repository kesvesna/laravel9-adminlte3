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
     * Show the applications dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.renter_application.index');
    }

    public function show()
    {
        return view('front.renter_application.show');
    }

    public function create()
    {
        return view('front.renter_application.create');
    }

}

