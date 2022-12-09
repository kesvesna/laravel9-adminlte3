@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование наименования
@endsection

@section('content')
    <form action="{{ route('admin.equipment_names.update', $equipment_name->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Наименование</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $equipment_name->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <button type="button" onclick="history.back()" class="btn btn-success btn-sm">Назад</button>
        <button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
    </form>
@endsection
