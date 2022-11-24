@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование статуса
@endsection

@section('content')
    <form action="{{ route('admin.user_statuses.update', $user_status->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">ID статуса</label>
            <input type="text" class="form-control" id="id" value="{{ $user_status->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Название</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user_status->name }}">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $user_status->slug }}">
        </div>
        <div class="mb-3">
            <label for="sort_order" class="form-label">Номер в сортировке</label>
            <input type="number" class="form-control" name="sort_order" id="sort_order" value="{{ $user_status->sort_order }}">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible" {{ $user_status->visible ? 'checked' : '' }}>
            <label class="form-check-label" for="visible">
                Видно в списках
            </label>
        </div>
        <a href="{{ route('admin.user_statuses.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
