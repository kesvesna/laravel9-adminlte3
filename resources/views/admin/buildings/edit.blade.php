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
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $building->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.buildings.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
