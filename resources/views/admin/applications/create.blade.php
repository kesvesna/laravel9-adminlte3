@extends('admin.layouts.admin')

@section('title')
    @parent Создание заявки
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.applications.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="trk_id" class="form-label">TRK_ID</label>
            <input type="text" class="form-control" id="trk_id" name="trk_id">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control" id="comment" name="comment"></textarea>
        </div>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
