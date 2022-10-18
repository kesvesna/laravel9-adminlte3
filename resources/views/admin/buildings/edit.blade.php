@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование блока/зоны
@endsection

@section('content')
    <form action="{{ route('admin.buildings.update', $building->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">БЛОК/ЗОНА</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $building->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="trk_id">ТРК</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option @if($building->trk->id == $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет трк в списке</option>
                @endforelse
            </select>
        </div>
        <a href="{{ route('admin.buildings.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
