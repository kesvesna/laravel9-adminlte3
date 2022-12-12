@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование акта
@endsection

@section('content')
    <form action="{{ route('admin.acts.update', $act->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control form-control-sm" id="id" value="{{ $act->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="trk_id">ТОРГОВЫЙ КОМПЛЕКС</label>
            <select name="trk_id" id="trk_id" class="form-control form-control-sm">
                @forelse($trks as $trk)
                    <option @if($act->trk->id === $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет комплексов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="application_status_id">СТАТУС</label>
            <select name="application_status_id" id="application_status_id" class="form-control form-control-sm">
                @forelse($act_statuses as $status)
                    <option @if($act->act_status->id === $status->id) selected @endif
                    value="{{ $status->id }}">{{ $status->name }}</option>
                @empty
                    <option value="0">Нет статусов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Подразделение</label>
            <select name="service_id" id="service_id" class="form-control form-control-sm">
                @forelse($services as $service)
                    <option @if($act->service->id === $service->id) selected @endif
                    value="{{ $service->id }}">{{ $service->name }}</option>
                @empty
                    <option value="0">Нет подразделений в списке</option>
                @endforelse
            </select>
        </div>
        <a href="{{ route('admin.acts.index') }}" class=" btn btn-sm  btn-success mr-3">Назад</a>
        <button type="submit" class=" btn btn-sm  btn-primary">Сохранить</button>
    </form>
@endsection
