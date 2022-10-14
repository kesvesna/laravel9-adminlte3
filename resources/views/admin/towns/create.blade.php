@extends('admin.layouts.admin')

@section('title')
    @parent Добавление города
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.towns.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">НАЗВАНИЕ</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
