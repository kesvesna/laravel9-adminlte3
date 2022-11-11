<?php

namespace App\Http\Controllers\Admin\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timesheet()
    {
        return view('admin.profiles.timesheet');
    }

}
