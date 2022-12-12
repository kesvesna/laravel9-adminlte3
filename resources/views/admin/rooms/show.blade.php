@extends('admin.layouts.admin')

@section('title')
    @parent Помещение
@endsection

@section('content')
    <br>
    <h2>Помещение {{ $room->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $room->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $room->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $room->name }}</td>
        </tr>
        <tr>
            <th scope="row">Назначение</th>
            <td>{{ $room->room_type->name }}</td>
        </tr>
        <tr>
            <th scope="row">Статус</th>
            <td>{{ $room->room_status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $room->slug }}</td>
        </tr>
        <tr>
            <th scope="row">Комментарий</th>
            <td>{{ $room->comment }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="button" onclick="history.back()" class=" btn btn-sm  btn-success  ">Назад</button>
        <a href="{{ route('admin.rooms.edit', $room->id) }}" class=" btn btn-sm  btn-warning   ">Редактировать</a>
        <button type="submit" class=" btn btn-sm  btn-danger  ">Удалить</button>
    </form>
@endsection
