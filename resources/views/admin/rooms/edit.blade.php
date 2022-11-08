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
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
