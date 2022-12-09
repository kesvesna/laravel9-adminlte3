@extends('admin.layouts.admin')

@section('title')
    @parent Тип оборудования
@endsection

@section('content')
    <br>
    <h2>Тип оборудования {{ $system->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $system->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $system->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $system->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $system->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.systems.destroy', $system->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="button" onclick="history.back()" class="btn btn-success btn-sm">Назад</button>
        <a href="{{ route('admin.systems.edit', $system->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
    </form>
@endsection
