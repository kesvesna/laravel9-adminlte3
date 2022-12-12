@extends('admin.layouts.admin')

@section('title')
    @parent Пользователь
@endsection

@section('content')
    <br>
    <h2>Пользователь №{{ $user->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Отредактирован</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
        <tr>
            <th scope="row">Имя</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th scope="row">Почта</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th scope="row">Статус</th>
            <td>{{ $user->status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Пароль</th>
            <td>{{ $user->password }}</td>
        </tr><tr>
            <th scope="row">Пользователя видно в списках</th>
            <td>{{$user->visible ? 'Да' : 'Нет'}}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.users.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <a href="{{ route('admin.users.edit', $user->id) }}"
           class=" btn btn-sm  btn-warning mr-3">Редактировать</a>
        <button type="submit" class=" btn btn-sm  btn-danger">Удалить</button>
    </form>
@endsection
