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
            <input required type="text" class="form-control" id="name" name="name" value="{{ $room->name }}">
            @error('name')
                <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="room_type_id">Тип помещения</label>
            <select name="room_type_id" id="room_type_id" class="form-control">
                @forelse($room_types as $type)
                    <option
                        {{ $room->room_type_id == $type->id ? ' selected' : ''}}
                        value="{{ $type->id }}">{{ $type->name }}</option>
                @empty
                    <option value="">Нет типов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <input  type="text" value="{{ $room->comment }}" class="form-control" id="comment" name="comment">
            @error('comment')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input  required type="text" value="{{ $room->slug }}" class="form-control" id="slug" name="slug">
            @error('slug')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
