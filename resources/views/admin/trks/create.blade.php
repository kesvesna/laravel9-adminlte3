@extends('admin.layouts.admin')

@section('title')
    @parent Добавление трк
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.trks.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">НАЗВАНИЕ КОМПЛЕКСА</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name">
            @error('name')
                <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="town_id">ГОРОД</label>
            <select name="town_id" id="town_id" class="form-control">
                @forelse($towns as $town)
                    <option
                        {{ old('town_id') == $town->id ? ' selected' : ''}}
                        value="{{ $town->id }}">{{ $town->name }}</option>
                @empty
                    <option value="0">Нет городов в списке</option>
                @endforelse
            </select>
        </div>
        <a href="{{ route('admin.trks.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
