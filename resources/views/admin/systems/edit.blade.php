@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование системы/услуги
@endsection

@section('content')
    <form action="{{ route('admin.systems.update', $system->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Система/Услуга</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $system->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.systems.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
