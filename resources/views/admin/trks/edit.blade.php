@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование трк
@endsection

@section('content')
    <form action="{{ route('admin.trks.update', $trk->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Торговый комплекс</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $trk->name }}">
        </div>
        <a href="{{ route('admin.trks.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
