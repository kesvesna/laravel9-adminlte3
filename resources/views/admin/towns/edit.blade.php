@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование города
@endsection

@section('content')
    <form action="{{ route('admin.towns.update', $town->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">ГОРОД</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $town->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.towns.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
