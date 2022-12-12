@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование оборудования
@endsection

@section('content')
    <div class="container-fluid pt-3">
    @if ($message = session()->get('danger'))
        <div class="alert alert-danger alert-dismissible" role="alert" id="equipment_danger_message">
            <button id=" btn btn-sm_equipment_danger_message" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i>{{ $message }}</h5>
        </div>
    @endif
    <form action="{{ route('admin.equipments.update', $equipment->id) }}" method="post" class="pb-3">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control form-control-sm" id="id" value="{{ $equipment->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="trk_id">Торговый комплекс</label>
            <select disabled name="trk_id" id="trk_id" class="form-control form-control-sm">
                @forelse($trks as $trk)
                    <option @if($equipment->room->trk->id === $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="">Нет комплексов в списке</option>
                @endforelse
            </select>
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="building_id">Блок/Зона</label>--}}
{{--            <select name="building_id" id="building_id" class="form-control form-control-sm">--}}
{{--                @forelse($buildings as $building)--}}
{{--                    <option @if($equipment->room->building->id === $building->id) selected @endif--}}
{{--                    value="{{ $building->id }}">{{ $building->name }}</option>--}}
{{--                @empty--}}
{{--                    <option value="">Нет блоков/зон в списке</option>--}}
{{--                @endforelse--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="floor_id">Этаж/Уровень</label>--}}
{{--            <select name="floor_id" id="floor_id" class="form-control form-control-sm">--}}
{{--                @forelse($floors as $floor)--}}
{{--                    <option @if($equipment->room->floor->id === $floor->id) selected @endif--}}
{{--                    value="{{ $floor->id }}">{{ $floor->name }}</option>--}}
{{--                @empty--}}
{{--                    <option value="">Нет этажей в списке</option>--}}
{{--                @endforelse--}}
{{--            </select>--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="room_id">Помещение</label>
            <select name="room_id" id="room_id" class="form-control form-control-sm">
                @forelse($rooms as $room)
                    <option @if($equipment->room->room->id === $room->id) selected @endif
                    value="{{ $room->id }}">{{ $room->room->name }}&nbsp;&nbsp;{{'(' . $room->floor->name . ', ' . $room->building->name . ')'}}</option>
                @empty
                    <option value="">Нет помещений в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="system_type_id">Тип оборудования</label>
            <select name="system_type_id" id="system_type_id" class="form-control form-control-sm">
                @forelse($systems as $system)
                    <option @if($equipment->system->id === $system->id) selected @endif
                    value="{{ $system->id }}">{{ $system->name }}</option>
                @empty
                    <option value="">Нет систем в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="equipment_status_id">Статус</label>
            <select name="equipment_status_id" id="equipment_status_id" class="form-control form-control-sm">
                @forelse($equipment_statuses as $status)
                    <option @if($equipment->currentHistory->equipment_status->id === $status->id) selected @endif
                    value="{{ $status->id }}">{{ $status->name }}</option>
                @empty
                    <option value="">Нет статусов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="equipment_name_id">Наименование по проекту</label>
            <select name="equipment_name_id" id="equipment_name_id" class="form-control form-control-sm">
                @forelse($names as $name)
                    <option @if($equipment->name->id === $name->id) selected @endif
                    value="{{ $name->id }}">{{ $name->name }}</option>
                @empty
                    <option value="">Нет наименований в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="visible">Видно в списках</label>
            <select name="visible" id="visible" class="form-control form-control-sm">
                    <option value="1" @if($equipment->visible) selected @endif>Да</option>
                    <option value="" @if(!$equipment->visible) selected @endif>Нет</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control form-control-sm" id="comment"
                      name="comment">{{ $equipment->currentHistory->comment }}</textarea>
        </div>
        <a href="{{ route('admin.equipments.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
    </div>
    <script>
        function admin_equipment_edit_page_ready() {
            const targetDiv = document.getElementById("equipment_danger_message");
            const  btn btn-sm = document.getElementById(" btn btn-sm_equipment_danger_message");
            if( btn btn-sm){
                 btn btn-sm.onclick = function () {
                    targetDiv.style.display = "none";
                };
            }
        }
        document.addEventListener("DOMContentLoaded", admin_equipment_edit_page_ready);
    </script>
@endsection
