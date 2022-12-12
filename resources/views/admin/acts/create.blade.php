@extends('admin.layouts.admin')

@section('title')
    @parent Создание акта
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.acts.store') }}" method="post">
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
                <option value="1">По плану</option>
            </select>
        </div>
        <a href="{{ route('admin.acts.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
