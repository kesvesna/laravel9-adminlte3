@extends('admin.layouts.admin')

@section('title')
    @parent Наименование
@endsection

@section('content')
    <br>
    <h2>Наименование {{ $equipment_name->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $equipment_name->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $equipment_name->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $equipment_name->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $equipment_name->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.equipment_names.destroy', $equipment_name->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="button" onclick="history.back()" class=" btn btn-sm  btn-success  ">Назад</button>
        <a href="{{ route('admin.equipment_names.edit', $equipment_name->id) }}" class=" btn btn-sm  btn-warning  ">Редактировать</a>
        <button type="submit" class=" btn btn-sm  btn-danger  ">Удалить</button>
    </form>
@endsection
