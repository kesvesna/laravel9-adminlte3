<?php

namespace App\Http\Controllers\Front\Acts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}

