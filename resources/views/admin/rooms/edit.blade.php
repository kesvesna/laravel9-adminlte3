@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование помещения
@endsection

@section('content')
    <form action="{{ route('admin.rooms.update', $room->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">ПОМЕЩЕНИЕ</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="trk_id">ТРК</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option @if($room->trk->id == $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет трк в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="building_id">БЛОК/ЗОНА</label>
            <select name="building_id" id="building_id" class="form-control">
                @forelse($buildings as $building)
                    <option @if($room->building->id == $building->id) selected @endif
                    value="{{ $building->id }}">{{ $building->name }}</option>
                @empty
                    <option value="0">Нет блоков/зон в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="floor_id">ЭТАЖ/УРОВЕНЬ</label>
            <select name="floor_id" id="floor_id" class="form-control">
                @forelse($floors as $floor)
                    <option @if($room->floor->id == $floor->id) selected @endif
                    value="{{ $floor->id }}">{{ $floor->name }}</option>
                @empty
                    <option value="0">Нет этажей/уровней в списке</option>
                @endforelse
            </select>
        </div>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
