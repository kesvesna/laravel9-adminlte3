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
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $trk->name }}">
            @error('name')
            <p class="text-danger">{{ __($message) }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="town_id">ГОРОД</label>
            <select name="town_id" id="town_id" class="form-control form-control-sm">
                @forelse($towns as $town)
                    <option @if($trk->town->id === $town->id) selected @endif
                    value="{{ $town->id }}">{{ $town->name }}</option>
                @empty
                    <option value="0">Нет городов в списке</option>
                @endforelse
            </select>
        </div>
        <a href="{{ route('admin.trks.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
