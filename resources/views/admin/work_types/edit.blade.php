@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование типа работ
@endsection

@section('content')
    <form action="{{ route('admin.work_types.update', $work_type->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Тип работ</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $work_type->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <a href="{{ route('admin.work_types.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
