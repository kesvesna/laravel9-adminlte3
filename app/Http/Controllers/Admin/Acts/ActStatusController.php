<?php

namespace App\Http\Controllers\Admin\Acts;

use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Acts\Act;
use App\Models\Acts\ActStatuses;
use App\Http\Requests\Acts\StoreActStatusFormRequest;
use App\Http\Requests\Acts\UpdateActStatusFormRequest;

class ActStatusController extends Controller
{
    /**
     * Show the acts dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.act_statuses.index', [
            'act_statuses' => ActStatuses::paginate(config('admin.act_statuses.pagination')),
            'acts_count' => Act::count(),
            'act_statuses_count' => ActStatuses::where('visible', 1)->count(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create() : View
    {
        return view('admin.act_statuses.create');
    }

    public function store(StoreActStatusFormRequest $request, ActStatuses $act_status)
    {
        if($request->isMethod('post')){

            $act_status->fill($request->validated());
            $act_status['visible'] = $request->input('visible') ? 1 : 0;
            $act_status['slug'] = Str::slug($request->name);

            if($act_status->save())
            {
                return redirect()->route('admin.act_statuses.show', $act_status->id);
            }
        }
        return redirect()->route('admin.act_statuses.create');
    }

    public function show(ActStatuses $act_status)
    {
        return view('admin.act_statuses.show',[
            'act_status' => $act_status
        ]);
    }

    public function edit(ActStatuses $act_status)
    {
        return view('admin.act_statuses.edit', [
            'act_status' => $act_status,
            'act_statuses' => ActStatuses::all(),
        ]);
    }

    public function update(ActStatuses $act_status, UpdateActStatusFormRequest $request)
    {
        if($request->isMethod('patch')){

            $act_status->fill($request->validated());
            $act_status['visible'] = $request->input('visible') ? 1 : 0;

            if($act_status->update())
            {
                return redirect()->route('admin.act_statuses.show', $act_status->id);
            }
        }
        return redirect()->route('admin.act_statuses.show', $act_status->id);
    }

    public function destroy(ActStatuses $act_status)
    {
        $act_status->delete();
        return redirect()->route('admin.act_statuses.index');
    }

}

