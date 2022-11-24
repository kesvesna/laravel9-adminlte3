@extends('front.layouts.main')

@section('title')
    @parent | Оборудование
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
            <h5 style="color: white;" class="pt-3">Оборудование</h5>
        <form action="{{ route('front.equipment.index') }}" method="get">
        <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 pt-2 d-md-none">
            <div class="col">
                <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                <select name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                    <option value="">Все</option>
                    @forelse($trks as $trk)
                        <option  @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif value="{{ $trk->id }}">{{ $trk->name }}</option>
                    @empty
                        Нет трк
                    @endforelse
                </select>
            </div>
        </div>
            <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 pt-2 d-md-none">
                <div class="col">
                    <label for="system_type_id" class="form-label" style="color: white;">Оборудование/Услуга</label>
                    <select name="system_type_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($systems as $system)
                            <option  @if(isset($old_filters['system_type_id'])){{ $old_filters['system_type_id'] == $system->id ? ' selected' : '' }} @endif value="{{ $system->id }}">{{ $system->name }}</option>
                        @empty
                            Нет систем
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 pt-2 d-md-none">
                <div class="col">
                    <label for="room_id" class="form-label" style="color: white;">Помещение</label>
                    <input list="rooms" value="@if(isset($old_filters['room_id'])){{ $old_filters['room_id']}}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="room_id" type="search" class="form-control" placeholder="Поиск" aria-label="room_id" aria-describedby="room_id">
                    <datalist id="rooms">
                        @forelse($rooms as $room)
                            <option value="{{$room->name}}">
                                @empty
                                    Нет названий оборудования
                        @endforelse
                    </datalist>
                </div>
            </div>
        </form>
        <form action="{{ route('front.equipment.index') }}" method="get">
        <table class="table table-bordered table-hover mt-4" style="background: rgba( 255, 255, 255, 0.1 );
                                                                    backdrop-filter: blur( 1px );
                                                                    -webkit-backdrop-filter: blur( 1px );
                                                                    border-radius: 5px;
                                                                    border: 1px solid rgba( 255, 255, 255, 0.18 );">
            <thead>
            <tr>
                <th scope="col" style="width: 21%;"  class="d-none d-lg-table-cell">
                    ТРК
                </th>
                <th scope="col" style="width: 21%;"  class="d-none d-lg-table-cell">
                    ОБОРУДОВАНИЕ/УСЛУГА
                </th>
                <th scope="col" style="width: 21%;"  class="d-none d-lg-table-cell">
                    ПОМЕЩЕНИЕ
                </th>
                <th scope="col" style="width: 21%;"  class="">
                    НАИМЕНОВАНИЕ
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="d-none d-lg-table-cell">
                    <select name="trk_id" class="form-select" aria-label="trk_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($trks as $trk)
                            <option @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif value="{{ $trk->id }}">{{ $trk->name }}</option>
                        @empty
                            Нет трк
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-lg-table-cell">
                    <select name="system_type_id" class="form-select" aria-label="system_type_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($systems as $system)
                            <option @if(isset($old_filters['system_type_id'])){{ $old_filters['system_type_id'] == $system->id ? ' selected' : '' }} @endif value="{{ $system->id }}">{{ $system->name }}</option>
                        @empty
                            Нет систем
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-lg-table-cell">
                    <input list="rooms" onchange="this.form.submit()" value="@if(isset($old_filters['room_id'])){{ $old_filters['room_id']}}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="room_id" type="search" class="form-control" placeholder="Поиск" aria-label="room_id" aria-describedby="room_id">
                    <datalist id="rooms">
                        @forelse($rooms as $room)
                            <option value="{{$room->name}}">
                                @empty
                                    Нет названий оборудования
                        @endforelse
                    </datalist>
                </td>
                <td>
                    <input list="equipment_names" onchange="this.form.submit()" value="@if(isset($old_filters['equipment_name_id'])){{$old_filters['equipment_name_id']}}@endif" autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="equipment_name_id" type="search" class="form-control" placeholder="Поиск" aria-label="equipment_name_id" aria-describedby="equipment_name_id">
                    <datalist id="equipment_names">
                        @forelse($equipment_names as $name)
                            <option value="{{$name->name}}">
                        @empty
                            Нет названий оборудования
                        @endforelse
                    </datalist>
                </td>
            </tr>
            @forelse($equipments as $equipment)
                <tr style="color: white;"  onclick="window.location='{{ route('front.equipment.show', $equipment->id) }}';">
                    <td class="d-none d-lg-table-cell">{{ $equipment->trk->name }}</td>
                    <td class="d-none d-lg-table-cell">{{ $equipment->system->name }}</td>
                    <td class="d-none d-lg-table-cell">{{ $equipment->room->name }}</td>
                    <td class="">{{ $equipment->name->name }}</td>
                </tr>
                @empty
                    Нет оборудования
            @endforelse
            <tr>
                <th colspan="6">
                    <a href="{{ route('front.equipment.index') }}" class="btn col-12 btn-sm" style="background: rgba( 7, 250, 7, 0.1 );
                                                                    backdrop-filter: blur( 1px );
                                                                    -webkit-backdrop-filter: blur( 1px );
                                                                    border-radius: 5px;
                                                                    border: 1px solid rgba( 255, 255, 255, 0.18 );"><b>Сброс фильтров</b></a>
                </th>
            </tr>
            </tbody>
        </table>
        </form>
        {{ $equipments->withQueryString()->links() }}
    </div>
    @include('front.components.navbar')
</main>
@endsection
