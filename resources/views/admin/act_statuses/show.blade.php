@extends('admin.layouts.admin')

@section('title')
    @parent Статус заявки
@endsection

@section('content')
    <br>
    <h2>Статус {{ $act_status->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $act_status->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $act_status->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $act_status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $act_status->slug }}</td>
        </tr>
        <tr>
            <th scope="row">Видно в списках</th>
            <td>{{ $act_status->visible ? 'Да' : 'Нет' }}</td>
        </tr>
        <tr>
            <th scope="row">Номер в сортировке</th>
            <td>{{ $act_status->sort_order }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.act_statuses.destroy', $act_status->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.act_statuses.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <a href="{{ route('admin.act_statuses.edit', $act_status->id) }}"
           class=" btn btn-sm  btn-warning mr-3">Редактировать</a>
        <button type="submit" class=" btn btn-sm  btn-danger">Удалить</button>
    </form>
@endsection
