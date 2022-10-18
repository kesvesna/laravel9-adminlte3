@extends('admin.layouts.admin')

@section('title')
    @parent Добавление этажа/уровня
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.floors.store') }}" method="post">
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
        <div class="mb-3">
            <label for="name" class="form-label">ЭТАЖ/УРОВЕНЬ</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.floors.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
