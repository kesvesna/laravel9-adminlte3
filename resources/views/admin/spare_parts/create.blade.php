@extends('admin.layouts.admin')

@section('title')
    @parent Добавление детали
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.spare_parts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Деталь</label>
            <input type="text" value="{{ old('name') }}" class="form-control form-control-sm" id="name" name="name">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.spare_parts.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
