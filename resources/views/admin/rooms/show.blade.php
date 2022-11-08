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
            <th scope="row">Город</th>
            <td>{{ $room->trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Блок/Зона</th>
            <td>{{ $room->building->name }}</td>
        </tr>
        <tr>
            <th scope="row">Этаж/Уровень</th>
            <td>{{ $room->floor->name }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $room->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $room->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-success mr-3">Назад</a>
        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning mr-3">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endsection
