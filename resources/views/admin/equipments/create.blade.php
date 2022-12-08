@extends('admin.layouts.admin')

@section('title')
    @parent Создание оборудования
@endsection

@section('content')
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    <form action="{{ route('admin.equipments.store') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="trk_id">ТОРГОВЫЙ КОМПЛЕКС</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option
                        {{ old('trk_id') == $trk->id ? ' selected' : ''}}
                        value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет комплексов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="system_type_id">ТИП ОБОРУДОВАНИЯ/УСЛУГА</label>
            <select name="system_type_id" id="system_type_id" class="form-control">
                @forelse($systems as $system)
                    <option
                        {{ old('system_type_id') == $system->id ? ' selected' : ''}}
                        value="{{ $system->id }}">{{ $system->name }}</option>
                @empty
                    <option value="0">Нет типов в списке</option>
                @endforelse
            </select>
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="building_id">Блок/Зона</label>--}}
{{--            <select name="building_id" id="building_id" class="form-control">--}}
{{--                @forelse($buildings as $building)--}}
{{--                    <option--}}
{{--                        {{ old('building_id') == $building->id ? ' selected' : ''}}--}}
{{--                        value="{{ $building->id }}">{{ $building->name }}</option>--}}
{{--                @empty--}}
{{--                    <option value="0">Нет блоков/зон</option>--}}
{{--                @endforelse--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="floor_id">Этаж/Уровень</label>--}}
{{--            <select name="floor_id" id="floor_id" class="form-control">--}}
{{--                @forelse($floors as $floor)--}}
{{--                    <option--}}
{{--                        {{ old('floor_id') == $floor->id ? ' selected' : ''}}--}}
{{--                        value="{{ $floor->id }}">{{ $floor->name }}</option>--}}
{{--                @empty--}}
{{--                    <option value="0">Нет этажей</option>--}}
{{--                @endforelse--}}
{{--            </select>--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="room_id">Помещение</label>
            <select name="room_id" id="room_id" class="form-control">
                @forelse($rooms as $room)
                    <option
                        {{ old('room_id') == $room->id ? ' selected' : ''}}
                        value="{{ $room->id }}">{{ $room->room->name}} &nbsp;&nbsp;&nbsp;{{'( ' . $room->floor->name . ', ' }}{{ $room->building->name . ' )' }}</option>
                @empty
                    <option value="">Нет помещений</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="equipment_name_id">Наименование по проекту</label>
            <select name="equipment_name_id" id="equipment_name_id" class="form-control">
                @forelse($equipment_names as $equipment_name)
                    <option
                        {{ old('equipment_name_id') == $equipment_name->id ? ' selected' : ''}}
                        value="{{ $equipment_name->id }}">{{ $equipment_name->name }}</option>
                @empty
                    <option value="0">Нет наименований</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="equipment_status_id">СТАТУС</label>
            <select name="equipment_status_id" id="equipment_status_id" class="form-control">
                @forelse($equipment_statuses as $status)
                    <option
                        {{ old('equipment_status_id') == $status->id ? ' selected' : ''}}
                        value="{{ $status->id }}">{{ $status->name }}</option>
                @empty
                    <option value="0">Нет статусов</option>
                @endforelse
            </select>
        </div>
        <input class="form-control" type="file" id="files" multiple name="files[]" accept="image/*, video/*, audio/*">
        <hr>
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
        <a href="{{ route('admin.equipments.index') }}" class="btn btn-success mr-3 mt-3 mb-3">Назад</a>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Сохранить</button>
    </form>



    <style>
        #loader {
            position: absolute;
            right: 18px;
            top: 30px;
            width: 20px;
        }
    </style>

@endsection
