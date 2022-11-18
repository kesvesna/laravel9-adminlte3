@extends('admin.layouts.admin')

@section('title')
    @parent Ремонт
@endsection

@section('content')
    <br>
    <h2>Ремонт {{ $repair->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $repair->id }}</td>
        </tr>
        <tr>
            <th scope="col" class="col-3">Запланирован на</th>
            <td>{{ $repair->plan_date }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $repair->created_at }}</td>
        </tr>
        @if($repair->application_id > 0)
            <tr>
                <th scope="row">По заявке</th>
                <td>{{ $repair->application_id }}</td>
            </tr>
        @endif
        <tr>
            <th scope="row">ТРК</th>
            <td>{{ $repair->trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Статус</th>
            <td>{{ $repair->repair_status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Подразделение</th>
            <td>{{ $repair->service->name }}</td>
        </tr>
        <tr>
            <th scope="row">Создал</th>
            <td>{{ $repair->user->name }}</td>
        </tr>
        <tr>
            <th scope="row">Исполнитель</th>
            <td>{{ $repair->responsible_user->name }}</td>
        </tr>
        <tr>
            <th scope="row">Комментарий</th>
            <td>{{ $repair->comment }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.repairs.destroy', $repair->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.repairs.index') }}" class="btn btn-success mr-3">Назад</a>
        <a href="{{ route('admin.repairs.edit', $repair->id) }}"
           class="btn btn-warning mr-3">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>

@endsection
