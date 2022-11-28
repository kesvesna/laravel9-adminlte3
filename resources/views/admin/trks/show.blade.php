@extends('admin.layouts.admin')

@section('title')
    @parent Торговый комплекс
@endsection

@section('content')
    <br>
    <h2>ТРК {{ $trk->name }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $trk->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $trk->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Город</th>
            <td>{{ $trk->town->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $trk->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.trks.destroy', $trk->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.trks.index') }}" class="btn btn-success mr-3 mb-3">Назад</a>
        <a href="{{ route('admin.trks.edit', $trk->id) }}" class="btn btn-warning mr-3 mb-3">Редактировать</a>
        <button type="submit" class="btn btn-danger mb-3">Удалить</button>
    </form>
    <br>
    <h4>Помещения {{ $trk->name }}</h4>
        <table class="table pb-5" id="trk-rooms-table">
            <thead>
                <tr>
                    <th>
                        Блок/Зона
                    </th>
                    <th>
                        Этаж/Уровень
                    </th>
                    <th>
                        Помещение
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
            <form action="{{ route('admin.trks.show', $trk->id) }}" method="get">
                @csrf
            <tr>
                <td>
                    <select name="building_id" class="form-control" aria-label="building_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Здания/Зоны</option>
                    @forelse($buildings as $building)
                            <option @if(isset($old_filters['building_id'])){{ $old_filters['building_id'] == $building->id ? ' selected' : '' }} @endif value="{{ $building->id }}">{{ $building->name }}</option>
                        @empty
                            Нет блоков/зданий
                        @endforelse
                    </select>
                </td>
                <td>
                    <select name="floor_id" class="form-control" aria-label="floor_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Этажи/уровни</option>
                        @forelse($floors as $floor)
                            <option  @if(isset($old_filters['floor_id'])){{ $old_filters['floor_id'] == $floor->id ? ' selected' : '' }} @endif value="{{ $floor->id }}">{{ $floor->name }}</option>
                        @empty
                            Нет этажей/уровней
                        @endforelse
                    </select>
                </td>
                <td>
                    <input onchange="this.form.submit();" list="rooms" value="@if(isset($old_filters['room_name'])){{ $old_filters['room_name']}}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="room_name" type="search" class="form-control" placeholder="Поиск" aria-label="room_name" aria-describedby="room_name">
                    <datalist id="rooms">
                        @forelse($rooms as $room)
                            <option value="{{$room->name}}">
                                @empty
                                    Нет помещений
                        @endforelse
                    </datalist>
                </td>
            </tr>
            </form>
            <form action="{{ route('admin.trk-building-floor-room.update', $trk->id) }}" method="post">
                @csrf
            @forelse($architectures as $architecture)
                    <tr>
                    <td>
                        <select id="buildings" name="buildings[]" class="form-control">
                            @forelse($buildings as $building)
                                <option value="{{ $building->id }}" @if($architecture->building_id == $building->id) selected @endif>{{ $building->name }}</option>
                            @empty
                                Нет блоков/зон
                            @endforelse
                        </select>
                    </td>
                    <td>
                        <select id="floors" name="floors[]" class="form-control">
                            @forelse($floors as $floor)
                                <option value="{{ $floor->id }}" @if($architecture->floor_id == $floor->id) selected @endif>{{ $floor->name }}</option>
                            @empty
                                Нет этажей
                            @endforelse
                        </select>
                    </td>
                    <td>
                        <select id="rooms" name="rooms[]" class="form-control">
                            @forelse($rooms as $room)
                                <option value="{{ $room->id }}" @if($architecture->room_id == $room->id) selected @endif>{{ $room->name }}</option>
                            @empty
                                Нет помещений
                            @endforelse
                        </select>
                    </td>
                        <td>
                            <button type="button" class="delete-trk-room" style="border: none; background-color: transparent;">
                                <img src="{{ asset('icons/delete.svg') }}" class="rounded" alt="Add image" height="30" width="30">
                            </button>
                        </td>
                    </tr>
                @empty
                @endforelse
                <tr>
                    <td>
                        <select id="buildings" name="buildings[]" class="form-control">
                            <option value="">Выберите ...</option>
                            @forelse($buildings as $building)
                                <option value="{{ $building->id }}">{{ $building->name }}</option>
                                    @empty
                                        Нет блоков/зон
                            @endforelse
                        </select>
                    </td>
                    <td>
                        <select id="floors" name="floors[]" class="form-control">
                            <option value="">Выберите ...</option>
                        @forelse($floors as $floor)
                                <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                            @empty
                                Нет этажей
                            @endforelse
                        </select>
                    </td>
                    <td>
                        <select id="rooms" name="rooms[]" class="form-control">
                            <option value="">Выберите ...</option>
                        @forelse($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @empty
                                Нет помещений
                            @endforelse
                        </select>
                    </td>
                    <td>
                        <button type="button" class="add-trk-room" style="border: none; background-color: transparent;">
                            <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add image" height="30" width="30">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="submit" class="btn btn-danger mb-5">Сохранить</button>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
        {{ $architectures->links() }}
@endsection

