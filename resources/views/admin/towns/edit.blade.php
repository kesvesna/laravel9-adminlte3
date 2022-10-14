@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование города
@endsection

@section('content')
    <form action="{{ route('admin.towns.update', $town->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">ГОРОД</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $town->name }}">
        </div>
        <button type="submit" class="btn btn-primary mr-3">Сохранить</button>
        <a href="{{ route('admin.towns.index') }}" class="btn btn-success">К городам</a>
    </form>
@endsection
