<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Filters\Users\UserFilter;
use App\Http\Filters\Users\UserHistoriesFilter;
use App\Http\Requests\Users\UserFilterRequest;
use App\Http\Requests\Users\UpdateUserFromRequest;
use App\Models\Users\UserHistories;
use App\Models\Users\UserMedias;
use App\Models\Users\Users;
use App\Models\Users\UserStatuses;
use App\Models\Services\Service;
use App\Models\Trks\Trk;
use App\Services\Users\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $filter = app()->make(UserHistoriesFilter::class, ['queryParams' => array_filter($data)]);
        $histories = UserHistories::filter($filter)->pluck('User_id')->all();

        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
        $Users = Users::filter($filter)
            ->with(['trk', 'histories', 'currentHistory'])
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $histories)
            ->paginate(config('admin.Users.pagination'));

        return view('admin.Users.index', [
            'Users' => $Users,
            'Users_count' => Users::count(),
            'trks' => Trk::all(),
            'services' => Service::all(),
            'User_statuses' => UserStatuses::where('visible', 1)->get(),
            'User_statuses_count' => UserStatuses::where('visible', 1)->count(),
            'old_filters' => $data
        ]);
    }

    public function create()
    {
        return view('admin.Users.create',[
            'trks' => Trk::all(),
            'User_statuses' => UserStatuses::all(),
        ]);
    }

    public function store(Request $request, UploadService $uploadService)
    {
        $data = $request->validate([
            'trk_id' => [ 'required', 'integer', 'min:1' ],
            'User_status_id' => [ 'required', 'integer', 'min:1' ],
            'comment' => 'string',
        ]);

        Users::create($data);
        return redirect()->route('admin.Users.index');
    }

    public function show(Users $User)
    {
        return view('admin.Users.show',[
            'User' => $User
        ]);
    }

    public function edit(Users $User)
    {
        return view('admin.Users.edit', [
            'User' => $User,
            'trks' => Trk::all(),
            'User_statuses' => UserStatuses::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(Users $User, UpdateUserFromRequest $request)
    {
        if($request->isMethod('patch')){

            $data = $request->validated();

            $User->trk_id = $data['trk_id'];
            $User->comment = $data['comment'];

            try {
                DB::beginTransaction();

                if( $User->save() ){

                    $history['User_status_id'] = $data['User_status_id'];
                    $history['user_id'] = 1; // Auth::id
                    $history['service_id'] = $data['service_id'];
                    $history['User_id'] = $User->id;

                    UserHistories::create($history);

                    DB::commit();

                    return redirect()->route('admin.Users.index');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e);
            }
        }
        return redirect()->route('admin.Users.show', $User->id);
    }

    public function destroy(Users $User)
    {
        $User->delete();
        return redirect()->route('admin.Users.index');
    }

}

