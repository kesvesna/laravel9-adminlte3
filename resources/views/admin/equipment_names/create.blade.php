@extends('admin.layouts.admin')

@section('title')
    @parent Добавление наименования
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.equipment_names.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Наименование</label>
            <input type="text" value="{{ old('name') }}" class="form-control form-control-sm" id="name" name="name">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <button type="button" onclick="history.back()" class=" btn btn-sm  btn-success  ">Назад</button>
        <button type="submit" class=" btn btn-sm  btn-primary  ">Сохранить</button>
    </form>
@endsection
