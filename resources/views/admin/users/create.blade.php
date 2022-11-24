@extends('admin.layouts.admin')

@section('title')
    @parent Создание пользователя
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Фамилия И.О.</label>
            <input class="form-control" required name="name" id="name" type="text" placeholder="Иванов И.И.">
        </div>
        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input class="form-control" required name="email" id="email" type="email" placeholder="i.ivanov@mail.ru">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input class="form-control" required name="password" id="password" type="password">
        </div>
        <div class="form-group">
            <label for="user_status_id">Статус</label>
            <select required class="form-control" name="user_status_id" aria-label="select" onchange="this.form.submit()">
                @forelse($user_statuses as $status)
                    <option value="{{ $status->id }}" @if(isset($old_filters['user_status_id'])){{ $old_filters['user_status_id'] == $status->id ? ' selected' : '' }} @endif>{{ $status->name }}</option>
                @empty
                    <option value="">Нет статусов</option>
                @endforelse
            </select>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
