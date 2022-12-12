<?php

namespace App\Http\Controllers\Admin\Acts;

use App\Http\Controllers\Controller;
use App\Http\Filters\Acts\ActFilter;
use App\Http\Requests\acts\actFilterRequest;
use App\Http\Requests\acts\UpdateactFromRequest;
use App\Models\Acts\ActMedias;
use App\Models\Acts\Act;
use App\Models\Acts\ActStatuses;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Services\acts\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActController extends Controller
{
    /**
     * Show the acts dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ActFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(ActFilter::class, ['queryParams' => array_filter($data)]);
        $acts = Act::filter($filter)
            ->with(['trk'])
            ->orderBy('created_at', 'desc')
            ->paginate(config('admin.acts.pagination'));

        return view('admin.acts.index', [
            'acts' => $acts,
            'acts_count' => Act::count(),
            'trks' => Trk::all(),
            'services' => Service::all()->sortBy('name', SORT_NATURAL, true),
            'act_statuses' => ActStatuses::where('visible', 1)->get(),
            'act_statuses_count' => ActStatuses::where('visible', 1)->count(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.acts.create',[
            'trks' => Trk::all(),
            'act_statuses' => ActStatuses::all(),
        ]);
    }

    public function store(Request $request, UploadService $uploadService)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'act_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
        ]);

        Act::create($data);
        return redirect()->route('admin.acts.index');
    }

    public function show(Act $act)
    {
        return view('admin.acts.show',[
            'act' => $act
        ]);
    }

    public function edit(Act $act)
    {
        return view('admin.acts.edit', [
            'act' => $act,
            'trks' => Trk::all(),
            'act_statuses' => ActStatuses::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(Act $act, UpdateActFromRequest $request)
    {
        if($request->isMethod('patch')){

            $data = $request->validated();

            $act->trk_id = $data['trk_id'];
            $act->comment = $data['comment'];

            try {
                DB::beginTransaction();

                if( $act->save() ){

                    DB::commit();

                    return redirect()->route('admin.acts.index');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }
        return redirect()->route('admin.acts.show', $act->id);
    }

    public function destroy(Act $act)
    {
        $act->delete();
        return redirect()->route('admin.acts.index');
    }

}

