@extends('admin.layouts.admin')

@section('title')
    @parent Добавление помещения
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.rooms.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ПОМЕЩЕНИЕ</label>
            <input type="text" value="{{ old('name') }}" class="form-control form-control-sm" id="name" name="name">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="room_type_id">Тип помещения</label>
            <select name="room_type_id" id="room_type_id" class="form-control form-control-sm">
                @forelse($room_types as $type)
                    <option
                        {{ old('room_type_id') == $type->id ? ' selected' : ''}}
                        value="{{ $type->id }}">{{ $type->name }}</option>
                @empty
                    <option value="">Нет типов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <input type="text" value="{{ old('comment') }}" class="form-control form-control-sm" id="comment" name="comment">
            @error('comment')
                <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
