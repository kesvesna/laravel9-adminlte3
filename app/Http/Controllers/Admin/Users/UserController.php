<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Filters\Users\UserFilter;
use App\Http\Filters\Users\UserStatusesFilter;
use App\Http\Requests\Users\StoreUserFormRequest;
use App\Http\Requests\Users\UpdateUserFormRequest;
use App\Http\Requests\Users\UserFilterRequest;
use App\Models\User;
use App\Models\UserMedias;
use App\Models\UserStatuses;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Services\Users\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the Users dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(UserFilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(UserStatusesFilter::class, ['queryParams' => array_filter($data)]);
        $user_statuses = UserStatuses::filter($filter)->pluck('id')->all();

        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
        $users = User::filter($filter)
            ->with(['status'])
            ->orderBy('created_at', 'desc')
            ->whereIn('user_status_id', $user_statuses)
            ->paginate(config('admin.users.pagination'));

        return view('admin.users.index', [
            'users' => $users,
            'users_count' => User::count(),
            'trks' => Trk::all(),
            'services' => Service::all(),
            'user_statuses' => UserStatuses::where('visible', 1)->get(),
            'user_statuses_count' => UserStatuses::where('visible', 1)->count(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.users.create',[
            'user_statuses' => UserStatuses::all(),
        ]);
    }

    public function store(StoreUserFormRequest $request, UploadService $uploadService)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show',[
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'trks' => Trk::all(),
            'user_statuses' => UserStatuses::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(User $user, UpdateUserFormRequest $request)
    {
        if($request->isMethod('patch')){

            $data = $request->validated();

            if($user->password != $data['password'])
            {
                $data['password'] = Hash::make($data['password']);
            }

            try {
                DB::beginTransaction();

                if( $user->update($data) ){

                    DB::commit();

                    return redirect()->route('admin.users.index');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }
        return redirect()->route('admin.users.edit', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }

}

