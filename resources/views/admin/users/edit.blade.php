@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование пользователя
@endsection

@section('content')
    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group pt-3">
            <label for="id">ID</label>
            <input class="form-control form-control-sm" required name="id" id="id" type="text" value="{{$user->id}}" readonly>
        </div>
        <div class="form-group pt-3">
            <label for="name">Фамилия И.О.</label>
            <input class="form-control form-control-sm" required name="name" id="name" type="text" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input class="form-control form-control-sm" required name="email" id="email" type="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input class="form-control form-control-sm" required name="password" id="password" type="text" value="{{$user->password}}">
        </div>
        <div class="form-group">
            <label for="user_status_id">Статус</label>
            <select required class="form-control form-control-sm" name="user_status_id" aria-label="select">
                @forelse($user_statuses as $status)
                    <option value="{{$status->id}}"  @if($user->status->id === $status->id) selected @endif>{{ $status->name }}</option>
                @empty
                    <option value="">Нет статусов</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="user_status_id">Пользователя видно в списках</label>
            <select required class="form-control form-control-sm" name="visible" aria-label="select">
                    <option value="1" @if($user->visible == 1) selected @endif>Да</option>
                    <option value="0" @if($user->visible == 0) selected @endif>Нет</option>
            </select>
        </div>
        <a href="{{ route('admin.users.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
