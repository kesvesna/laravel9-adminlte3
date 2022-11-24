@extends('admin.layouts.admin')

@section('title')
    @parent Оборудование
@endsection

@section('content')
    <br>
    <h2>Оборудование №{{ $equipment->id }}, {{$equipment->name->name}}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $equipment->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создано</th>
            <td>{{ $equipment->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">ТРК</th>
            <td>{{ $equipment->trk->name }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.equipments.index') }}" class="btn btn-success mr-3">Назад</a>
        <a href="{{ route('admin.equipments.edit', $equipment->id) }}"
           class="btn btn-warning mr-3">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    <br>
    <h4>История {{$equipment->name->name}}</h4>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
            <tr>
                <th scope="col" class="col-3">Создано</th>
                <th scope="col" class="col-3">Статус</th>
                <th scope="col" class="col-3">Создал</th>
                <th scope="col" class="col-3">Комментарий</th>
            </tr>
            @forelse($equipment->histories as $history)
            <tr>
                <td>{{ $history->created_at }}</td>
                <td>{{ $history->equipment_status->name }}</td>
                <td>{{ $history->created_by_user->name }}</td>
                <td>{{ $history->comment }}</td>
            </tr>
        @empty
            Нет историй
        @endforelse
        </tbody>
    </table>

@endsection
