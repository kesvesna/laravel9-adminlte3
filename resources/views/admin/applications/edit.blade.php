@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование заявки
@endsection

@section('content')
    <form action="{{ route('admin.applications.update', $application->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">ID заявки</label>
            <input type="text" class="form-control" id="id" value="{{ $application->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="trk_id">ТОРГОВЫЙ КОМПЛЕКС</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option @if($application->trk->id === $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет комплексов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="application_status_id">СТАТУС</label>
            <select name="application_status_id" id="application_status_id" class="form-control">
                @forelse($application_statuses as $status)
                    <option @if($application->currentHistory->application_status->id === $status->id) selected @endif
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
                    <option @if($application->currentHistory->service->id === $service->id) selected @endif
                    value="{{ $service->id }}">{{ $service->name }}</option>
                @empty
                    <option value="0">Нет подразделений в списке</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control" id="comment"
                      name="comment">{{ $application->comment }}</textarea>
        </div>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
