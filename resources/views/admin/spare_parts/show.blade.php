@extends('admin.layouts.admin')

@section('title')
    @parent Деталь
@endsection

@section('content')
    <br>
    <h2>Деталь {{ $spare_part->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $spare_part->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $spare_part->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $spare_part->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $spare_part->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.spare_parts.destroy', $spare_part->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.spare_parts.index') }}" class="btn btn-success mr-3">Назад</a>
        <a href="{{ route('admin.spare_parts.edit', $spare_part->id) }}" class="btn btn-warning mr-3">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endsection
