<?php

namespace App\Http\Controllers\Front\Acts;

use App\Http\Controllers\Controller;
use App\Models\Applications\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function create_by_application(Applications $application)
    {
        dd($application);
        return view('front.act.create');
    }
}

