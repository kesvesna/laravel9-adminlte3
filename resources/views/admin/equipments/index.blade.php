@extends('admin.layouts.admin')

@section('title')
    @parent Оборудование
@endsection

@section('content')
    <br>
    <form method="get" action="{{ route('admin.equipments.create') }}" class="mb-3">
        <div class="row">
            <h2>Оборудование</h2>
            <button class="btn btn-success btn-sm ml-3" type="submit"><b>Создать</b></button>
        </div>
    </form>
    <hr>
        <a href="{{ route('admin.equipments.index') }}" class="btn btn-success btn-sm btn-block mb-3"><b>Сбросить все
                фильтры</b></a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>ТРК</th>
                    <th>ТИП/УСЛУГА</th>
                    <th>ПОМЕЩЕНИЕ</th>
                    <th>ОБОРУДОВАНИЕ</th>
                    <th colspan="3">ОПЕРАЦИИ</th>
                </tr>
                <form action="{{ route('admin.equipments.index') }}" method="get">
                <tr>
                    <th>
                        <select class="form-control" name="trk_id" aria-label="select" onchange="this.form.submit()">
                            <option selected value="">Все</option>
                            @forelse($trks as $trk)
                                <option value="{{ $trk->id }}" @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif>{{ $trk->name }}</option>
                            @empty
                                <option value="">Нет трк</option>
                            @endforelse
                        </select>
                    </th>
                    <th>
                        <select class="form-control" name="system_type_id" aria-label="select" onchange="this.form.submit()">
                            <option selected value="">Все</option>
                            @forelse($systems as $system)
                                <option value="{{ $system->id }}" @if(isset($old_filters['system_type_id'])){{ $old_filters['system_type_id'] == $system->id ? ' selected' : '' }} @endif>{{ $system->name }}</option>
                            @empty
                                <option value="">Нет систем</option>
                            @endforelse
                        </select>
                    </th>
                    <th>
                        <input onchange="this.form.submit();" list="rooms" value="@if(isset($old_filters['room_id'])){{ $old_filters['room_id']}}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="room_id" type="search" class="form-control" placeholder="Поиск" aria-label="room_id" aria-describedby="room_id">
                        <datalist id="rooms">
                            @forelse($rooms as $room)
                                <option value="{{$room->name}}">
                                    @empty
                                        Нет названий оборудования
                            @endforelse
                        </datalist>
                    </th>
                    <th>
                        <input list="equipment_names" onchange="this.form.submit()" value="@if(isset($old_filters['equipment_name_id'])){{$old_filters['equipment_name_id']}}@endif" autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="equipment_name_id" type="search" class="form-control" placeholder="Поиск" aria-label="equipment_name_id" aria-describedby="equipment_name_id">
                        <datalist id="equipment_names">
                            @forelse($equipment_names as $name)
                                <option value="{{$name->name}}">
                                    @empty
                                        Нет названий оборудования
                            @endforelse
                        </datalist>
                    </th>
                    <th colspan="3"></th>
                </tr>
                </form>
                </thead>
                <tbody>
                @forelse($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->trk->name }}</td>
                        <td>{{ $equipment->system->name }}</td>
                        <td>{{ $equipment->room->name }}</td>
                        <td>{{ $equipment->name->name }}</td>
                        <td><a href="{{ route('admin.equipments.show', $equipment->id) }}"><i
                                    class="nav-icon fas fa-eye ml-2 mr-2" style="color: green; opacity: .7;"
                                    title="Посмотреть"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.equipments.edit', $equipment->id) }}"><i
                                    class="nav-icon fas fa-edit ml-2 mr-2" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" style="border: none; background-color: transparent;"><i
                                        class="nav-icon fas fa-trash-alt ml-2 mr-2" style="color: red; opacity: .7;"
                                        title="Удалить"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    Нет заявок
                @endforelse
                </tbody>
            </table>
            {{ $equipments->withQueryString()->links() }}
        </div>
@endsection
