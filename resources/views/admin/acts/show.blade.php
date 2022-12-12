@extends('admin.layouts.admin')

@section('title')
    @parent Акт
@endsection

@section('content')
    <br>
    <h2>Акт {{ $act->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $act->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $act->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">ТРК</th>
            <td>{{ $act->trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Статус</th>
            <td>{{ $act->act_status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Подразделение</th>
            <td>{{ $act->service->name }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.acts.destroy', $act->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.acts.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <a href="{{ route('admin.acts.edit', $act->id) }}"
           class=" btn btn-sm  btn-warning mr-3">Редактировать</a>
        <button type="submit" class=" btn btn-sm  btn-danger">Удалить</button>
    </form>
@endsection
