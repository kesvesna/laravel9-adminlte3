@extends('admin.layouts.admin')

@section('title')
    @parent Блок/Зона
@endsection

@section('content')
    <br>
    <h2>Блок/Зона {{ $building->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $building->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $building->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $building->name }}</td>
        </tr>
        <tr>
            <th scope="row">Город</th>
            <td>{{ $building->trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $building->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.buildings.destroy', $building->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.buildings.index') }}" class="btn btn-success mr-3">Назад</a>
        <a href="{{ route('admin.buildings.edit', $building->id) }}" class="btn btn-warning mr-3">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endsection
