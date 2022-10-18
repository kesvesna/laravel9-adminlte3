@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование этажа/уровня
@endsection

@section('content')
    <form action="{{ route('admin.floors.update', $floor->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">ЭТАЖ/УРОВЕНЬ</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $floor->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="trk_id">ТРК</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option @if($floor->trk->id == $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет трк в списке</option>
                @endforelse
            </select>
        </div>
        <a href="{{ route('admin.floors.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
