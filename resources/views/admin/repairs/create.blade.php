@extends('admin.layouts.admin')

@section('title')
    @parent Планирование ремонта
@endsection

@section('content')
    <br>
    <form action="{{ route('admin.repairs.store') }}" method="post">
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
            <label for="repair_status_id">СТАТУС</label>
            <select name="repair_status_id" id="repair_status_id" class="form-control form-control-sm">
                <option value="1">По плану</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control form-control-sm" id="comment" name="comment"></textarea>
        </div>
        <a href="{{ route('admin.repairs.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
