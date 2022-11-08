@extends('admin.layouts.admin')

@section('title')
    @parent Добавление помещения
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.rooms.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="trk_id">ТРК</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option
                        {{ old('trk_id') == $trk->id ? ' selected' : ''}}
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
                    <option
                        {{ old('building_id') == $building->id ? ' selected' : ''}}
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
                    <option
                        {{ old('floor_id') == $floor->id ? ' selected' : ''}}
                        value="{{ $floor->id }}">{{ $floor->name }}</option>
                @empty
                    <option value="0">Нет этажей/уровней в списке</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">ПОМЕЩЕНИЕ</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
