@extends('admin.layouts.admin')

@section('title')
    @parent Создание статуса заявки
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.application_statuses.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="comment" class="form-label">Название</label>
            <input type="text" class="form-control form-control-sm" name="name" id="name" required>

        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible">
            <label class="form-check-label" for="visible">
                Показывать в списках
            </label>
        </div>
        <a href="{{ route('admin.application_statuses.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
