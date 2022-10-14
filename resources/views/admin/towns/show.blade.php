@extends('admin.layouts.admin')

@section('title')
    @parent Город
@endsection

@section('content')
    <br>
        <h2>Город {{ $town->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $town->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $town->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $town->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $town->slug }}</td>
        </tr>
        </tbody>
    </table>




        <form action="{{ route('admin.towns.destroy', $town->id) }}" method="post">
            @csrf
            @method('delete')
            <a href="{{ route('admin.towns.index') }}" class="btn btn-success mr-3">К городам</a>
            <a href="{{ route('admin.towns.edit', $town->id) }}" class="btn btn-warning mr-3">Редактировать</a>
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>



@endsection
