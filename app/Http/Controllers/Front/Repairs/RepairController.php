<?php

namespace App\Http\Controllers\Front\Repairs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Repairs\StoreRepairFormRequest;
use App\Models\Applications\Repair;
use App\Services\Repairs\UploadService;
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
     * Show the applications dashboard.
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
        return view('front.repair.create');
    }

    public function create_by_application(Repair $application)
    {
        return view('front.repair.create-by-application',[
            'application' => $application,
        ]);
    }

    public function store(StoreRepairFormRequest $request, UploadService $uploadService, Repair $application)
    {

        dd($application);
        if($request->isMethod('post')){

            $data = $request->validated();
            $data['user_id'] = 1; //Auth::id();
            $data['application_status_id'] = $application::NEW; // new

            if( $id = Repair::create($data)->id ){

                $media['application_id'] = $id;
                if ($request->hasFile('files')) {
                    foreach($request->file(['files']) as $file) {
                        $media['name'] = $uploadService->uploadMedia($file);
                        ApplicationMedias::create($media);
                    }
                }

                return redirect()->route('front.repair.index');
            }
        }

        return redirect()->route('front.repair.create');
    }

}

