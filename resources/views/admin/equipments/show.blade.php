@extends('admin.layouts.admin')

@section('title')
    @parent Оборудование
@endsection

@section('content')
    <div class="container">
    <br>
    <h2>Оборудование №{{ $equipment->id }}, {{$equipment->name->name}}</h2>
    <div class="table-responsive">
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
        <tr>
            <th scope="row">Тип оборудования/Услуга</th>
            <td>{{ $equipment->system->name }}</td>
        </tr>
        <tr>
            <th scope="row">Блок/Зона</th>
            <td>{{ $equipment->building->name }}</td>
        </tr>
        <tr>
            <th scope="row">Этаж</th>
            <td>{{ $equipment->floor->name }}</td>
        </tr>
        <tr>
            <th scope="row">Помещение</th>
            <td>{{ $equipment->room->name }}</td>
        </tr>
        <tr>
            <th scope="row">Наименование по проекту</th>
            <td>{{ $equipment->name->name }}</td>
        </tr>
        </tbody>
    </table>
    </div>
    <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="post">
        @csrf
        @method('delete')
        <div class="justify-content-between justify-content-md-start">
            <a href="{{ route('admin.equipments.index') }}" class="btn btn-success mr-3 btn-sm">Назад</a>
            <a href="{{ route('admin.equipments.edit', $equipment->id) }}"
               class="btn btn-warning mr-3 btn-sm">Редактировать</a>
            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
        </div>
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
        <hr>
        <p>фотографии</p>
        <p>заявки</p>
        <p>ремонт</p>
        <p>акты</p>
        <p>Из каких деталей состоит</p>
        <p>Потребители</p>
        <p>Откуда запитано</p>
        <p>Комментарии</p>
        <p>Ответственный</p>
        <p>QR код</p>
        <hr>
    </div>
@endsection
