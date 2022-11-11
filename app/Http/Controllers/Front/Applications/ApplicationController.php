<?php

namespace App\Http\Controllers\Front\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
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
        return view('front.application.index');
    }

    public function show()
    {
        return view('front.application.show');
    }

    public function create()
    {
        return view('front.application.create');
    }

}

