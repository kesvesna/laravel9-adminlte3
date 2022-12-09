@extends('admin.layouts.admin')

@section('title')
    @parent Этаж/Уровень
@endsection

@section('content')
    <br>
    <h2>Этаж/Уровень {{ $floor->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $floor->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $floor->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $floor->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $floor->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.floors.destroy', $floor->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="button" onclick="history.back()" class="btn btn-success btn-sm">Назад</button>
        <a href="{{ route('admin.floors.edit', $floor->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
    </form>
@endsection
