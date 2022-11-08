@extends('admin.layouts.admin')

@section('title')
    @parent Добавление блока/зоны
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.buildings.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">БЛОК/ЗОНА</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.buildings.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
