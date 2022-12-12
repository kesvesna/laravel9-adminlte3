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
        @if($repair->currentHistory->application_id > 0)
            <tr>
                <th scope="row">По заявке</th>
                <td>{{ $repair->currentHistory->application_id }}</td>
            </tr>
        @endif
        <tr>
            <th scope="row">ТРК</th>
            <td>{{ $repair->trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Статус</th>
            <td>{{ $repair->currentHistory->repair_status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Подразделение</th>
            <td>{{ $repair->currentHistory->service->name }}</td>
        </tr>
        <tr>
            <th scope="row">Создал</th>
            <td>{{ $repair->currentHistory->user->name }}</td>
        </tr>
        <tr>
            <th scope="row">Исполнитель</th>
            <td>{{ $repair->currentHistory->responsible_user->name }}</td>
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
        <a href="{{ route('admin.repairs.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <a href="{{ route('admin.repairs.edit', $repair->id) }}"
           class=" btn btn-sm  btn-warning mr-3">Редактировать</a>
        <button type="submit" class=" btn btn-sm  btn-danger">Удалить</button>
    </form>

@endsection
