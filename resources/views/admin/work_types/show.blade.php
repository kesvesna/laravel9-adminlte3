@extends('admin.layouts.admin')

@section('title')
    @parent Тип работ
@endsection

@section('content')
    <br>
    <h2>Тип работ {{ $work_type->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $work_type->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $work_type->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $work_type->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $work_type->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.work_types.destroy', $work_type->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.work_types.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <a href="{{ route('admin.work_types.edit', $work_type->id) }}" class=" btn btn-sm  btn-warning mr-3">Редактировать</a>
        <button type="submit" class=" btn btn-sm  btn-danger">Удалить</button>
    </form>
@endsection
