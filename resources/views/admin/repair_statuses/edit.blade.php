@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование статуса ремонта
@endsection

@section('content')
    <form action="{{ route('admin.repair_statuses.update', $repair_status->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control form-control-sm" id="id" value="{{ $repair_status->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Название</label>
            <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ $repair_status->name }}">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Slug</label>
            <input type="text" class="form-control form-control-sm" name="slug" id="slug" value="{{ $repair_status->slug }}">
        </div>
        <div class="mb-3">
            <label for="sort_order" class="form-label">Номер в сортировке</label>
            <input type="number" class="form-control form-control-sm" name="sort_order" id="sort_order" value="{{ $repair_status->sort_order }}">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible" {{ $repair_status->visible ? 'checked' : '' }}>
            <label class="form-check-label" for="visible">
                Видно в списках
            </label>
        </div>
        <a href="{{ route('admin.repair_statuses.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
