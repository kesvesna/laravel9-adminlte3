@extends('admin.layouts.admin')

@section('title')
    @parent Статус заявки
@endsection

@section('content')
    <br>
    <h2>Статус {{ $application_status->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $application_status->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $application_status->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $application_status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $application_status->slug }}</td>
        </tr>
        <tr>
            <th scope="row">Видно в списках</th>
            <td>{{ $application_status->visible ? 'Да' : 'Нет' }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.application_statuses.destroy', $application_status->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.application_statuses.index') }}" class="btn btn-success mr-3">Назад</a>
        <a href="{{ route('admin.application_statuses.edit', $application_status->id) }}"
           class="btn btn-warning mr-3">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endsection
