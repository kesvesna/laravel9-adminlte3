@extends('admin.layouts.admin')

@section('title')
    @parent Создание заявки
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.applications.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="trk_id">ТОРГОВЫЙ КОМПЛЕКС</label>
            <select name="trk_id" id="trk_id" class="form-control form-control-sm">
                @forelse($trks as $trk)
                    <option
                        {{ old('trk_id') == $trk->id ? ' selected' : ''}}
                        value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет комплексов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="application_status_id">СТАТУС</label>
            <select name="application_status_id" id="application_status_id" class="form-control form-control-sm">
                <option value="1">Новая</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control form-control-sm" id="comment" name="comment"></textarea>
        </div>
        <a href="{{ route('admin.applications.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
