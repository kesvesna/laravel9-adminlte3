@extends('admin.layouts.admin')

@section('title')
    @parent Пользователи
@endsection

@section('content')
    <br>
    <form method="get" action="{{ route('admin.users.create') }}" class="mb-3">
        <div class="row">
            <h2>Пользователи</h2>
            <button class=" btn btn-sm  btn-success   ml-3" type="submit"><b>Создать пользователя</b></button>
        </div>
    </form>
    <hr>
        <a href="{{ route('admin.users.index') }}" class=" btn btn-sm  btn-success    btn-block mb-3"><b>Сбросить все
                фильтры</b></a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ИМЯ</th>
                    <th>ПОЧТА</th>
                    <th>СТАТУС</th>
                    <th colspan="3">ОПЕРАЦИИ</th>
                </tr>
                <form action="{{ route('admin.users.index') }}" method="get">
                <tr>
                    <th>
                        <input list="ids" onchange="this.form.submit()" value="@if(isset($old_filters['id'])){{ $old_filters['id']}}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="id" type="search" class="form-control form-control-sm" placeholder="Поиск" aria-label="id" aria-describedby="id">
                        <datalist id="ids">
                            @forelse($users as $user)
                                <option value="{{$user->id}}">
                                    @empty
                                        Нет ID
                            @endforelse
                        </datalist>
                    </th>
                    <th>
                        <input list="names" onchange="this.form.submit()" value="@if(isset($old_filters['name'])){{ $old_filters['name']}}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="name" type="search" class="form-control form-control-sm" placeholder="Поиск" aria-label="name" aria-describedby="name">
                        <datalist id="names">
                            @forelse($users as $user)
                                <option value="{{$user->name}}">
                                    @empty
                                        Нет имен
                            @endforelse
                        </datalist>
                    </th>
                    <th>
                        <input list="emails" onchange="this.form.submit()" value="@if(isset($old_filters['email'])){{ $old_filters['email']}}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="email" type="search" class="form-control form-control-sm" placeholder="Поиск" aria-label="email" aria-describedby="email">
                        <datalist id="emails">
                            @forelse($users as $user)
                                <option value="{{$user->email}}">
                                    @empty
                                        Нет списка почты
                            @endforelse
                        </datalist>
                    </th>
                    <th>
                        <select class="form-control form-control-sm" name="user_status_id" aria-label="select" onchange="this.form.submit()">
                            <option selected value="">Все</option>
                            @forelse($user_statuses as $status)
                                <option value="{{ $status->id }}" @if(isset($old_filters['user_status_id'])){{ $old_filters['user_status_id'] == $status->id ? ' selected' : '' }} @endif>{{ $status->name }}</option>
                            @empty
                                <option value="">Нет статусов</option>
                            @endforelse
                        </select>
                    </th>
                    <th colspan="3"></th>
                </tr>
                </form>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status->name }}</td>
                        <td><a href="{{ route('admin.users.show', $user->id) }}"><i
                                    class="nav-icon fas fa-eye ml-2 mr-2" style="color: green; opacity: .7;"
                                    title="Посмотреть"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}"><i
                                    class="nav-icon fas fa-edit ml-2 mr-2" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" style="border: none; background-color: transparent;"><i
                                        class="nav-icon fas fa-trash-alt ml-2 mr-2" style="color: red; opacity: .7;"
                                        title="Удалить"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    Нет заявок
                @endforelse
                </tbody>
            </table>
            {{ $users->withQueryString()->links() }}
        </div>
@endsection
