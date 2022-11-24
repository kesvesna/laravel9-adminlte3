@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование заявки
@endsection

@section('content')
    <form action="{{ route('admin.equipments.update', $equipment->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">ID заявки</label>
            <input type="text" class="form-control" id="id" value="{{ $equipment->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="trk_id">ТОРГОВЫЙ КОМПЛЕКС</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option @if($equipment->trk->id === $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет комплексов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="equipment_status_id">СТАТУС</label>
            <select name="equipment_status_id" id="equipment_status_id" class="form-control">
                @forelse($equipment_statuses as $status)
                    <option @if($equipment->currentHistory->equipment_status->id === $status->id) selected @endif
                    value="{{ $status->id }}">{{ $status->name }}</option>
                @empty
                    <option value="0">Нет статусов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Подразделение</label>
            <select name="service_id" id="service_id" class="form-control">
                @forelse($services as $service)
                    <option @if($equipment->currentHistory->service->id === $service->id) selected @endif
                    value="{{ $service->id }}">{{ $service->name }}</option>
                @empty
                    <option value="0">Нет подразделений в списке</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control" id="comment"
                      name="comment">{{ $equipment->comment }}</textarea>
        </div>
        <a href="{{ route('admin.equipments.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
