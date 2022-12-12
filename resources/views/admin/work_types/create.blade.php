@extends('admin.layouts.admin')

@section('title')
    @parent Добавление типа работ
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.work_types.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Тип работ</label>
            <input type="text" value="{{ old('name') }}" class="form-control form-control-sm" id="name" name="name">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.work_types.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
