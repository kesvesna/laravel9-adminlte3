@extends('admin.layouts.admin')

@section('title')
    @parent Оборудование
@endsection

@section('content')
    <div class="container pt-2">
    <h2>Оборудование №{{ $equipment->id }}, {{$equipment->name->name}}</h2>
    <div class="table-responsive">
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-4">ID</th>
            <td>{{ $equipment->id }}</td>
        </tr>
        <tr>
            <th scope="row">ТРК</th>
            <td><a href="{{route('admin.trks.show', $equipment->room->trk->id)}}">{{ $equipment->room->trk->name }}</a></td>
        </tr>
        <tr>
            <th scope="row">Тип оборудования</th>
            <td><a href="{{route('admin.systems.show', $equipment->system->id)}}">{{ $equipment->system->name }}</a></td>
        </tr>
        <tr>
            <th scope="row">Блок/Зона</th>
            <td><a href="{{route('admin.buildings.show', $equipment->room->building->id)}}">{{ $equipment->room->building->name }}</a></td>
        </tr>
        <tr>
            <th scope="row">Этаж</th>
            <td><a href="{{route('admin.floors.show', $equipment->room->floor->id)}}">{{ $equipment->room->floor->name }}</a></td>
        </tr>
        <tr>
            <th scope="row">Помещение</th>
            <td><a href="{{route('admin.rooms.show', $equipment->room->room->id)}}">{{ $equipment->room->room->name }}&nbsp;&nbsp; {{ '(' . $equipment->room->room->room_type->name . ')' }}</a></td>
        </tr>
        <tr>
            <th scope="row">Наименование по проекту</th>
            <td>{{ $equipment->name->name }}</td>
        </tr>
        @forelse($equipment->medias as $media)
        <tr>
            <th scope="row">Файл</th>
                <td>
                    <a href="{{ Storage::disk('public')->url($media->name) }}" target="_blank">
                        <img class="img-thumbnail" style="width: 200px; height: 200px;" src="{{ Storage::disk('public')->url($media->name) }}" alt="Equipment file"></a></td>
        </tr>
        @empty
        @endforelse
        </tbody>
    </table>
    </div>
    <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="post">
        @csrf
        @method('delete')
        <div class="justify-content-between justify-content-md-start">
            <button type="button" onclick="history.back()" class=" btn btn-sm  btn-success mr-3  ">Назад</button>
            <a href="{{ route('admin.equipments.edit', $equipment->id) }}"
               class=" btn btn-sm  btn-warning mr-3  ">Редактировать</a>
            <button type="submit" class=" btn btn-sm  btn-danger  ">Удалить</button>
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
