<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserStatuses;
use App\Http\Requests\User_statuses\StoreUserStatusFormRequest;
use App\Http\Requests\User_statuses\UpdateUserStatusFormRequest;

class UserStatusController extends Controller
{
    /**
     * Show the Users dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.user_statuses.index', [
            'user_statuses' => UserStatuses::paginate(config('admin.user_statuses.pagination')),
            'users_count' => User::count(),
            'user_statuses_count' => UserStatuses::where('visible', 1)->count(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create() : View
    {
        return view('admin.user_statuses.create');
    }

    public function store(StoreUserStatusFormRequest $request, UserStatuses $user_status)
    {
        if($request->isMethod('post')){

            $user_status->fill($request->validated());
            $user_status['visible'] = $request->input('visible') ? 1 : 0;
            $user_status['slug'] = Str::slug($request->name);

            if($user_status->save())
            {
                return redirect()->route('admin.user_statuses.show', $user_status->id);
            }
        }
        return redirect()->route('admin.user_statuses.create');
    }

    public function show(UserStatuses $user_status)
    {
        return view('admin.user_statuses.show',[
            'user_status' => $user_status
        ]);
    }

    public function edit(UserStatuses $user_status)
    {
        return view('admin.user_statuses.edit', [
            'user_status' => $user_status,
            'user_statuses' => UserStatuses::all(),
        ]);
    }

    public function update(UserStatuses $user_status, UpdateUserStatusFormRequest $request)
    {
        if($request->isMethod('patch')){

            $user_status->fill($request->validated());
            $user_status['visible'] = $request->input('visible') ? 1 : 0;

            if($user_status->update())
            {
                return redirect()->route('admin.user_statuses.show', $user_status->id);
            }
        }
        return redirect()->route('admin.user_statuses.show', $user_status->id);
    }

    public function destroy(UserStatuses $user_status)
    {
        $user_status->delete();
        return redirect()->route('admin.user_statuses.index');
    }

}

