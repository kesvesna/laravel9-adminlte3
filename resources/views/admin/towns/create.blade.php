@extends('admin.layouts.admin')

@section('title')
    @parent Создание города
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.towns.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ГОРОД</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">SLUG</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
