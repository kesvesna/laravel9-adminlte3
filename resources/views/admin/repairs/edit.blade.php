@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование ремонта
@endsection

@section('content')
    <form action="{{ route('admin.repairs.update', $repair->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="id" class="form-label">ID ремонта</label>
            <input type="text" class="form-control" id="id" value="{{ $repair->id }}" readonly>
        </div>
        <div class="mb-3">
            <label class="mb-2" for="plan_date">Запланирован на</label>
            <br>
            <input value="{{ $repair->currentHistory->plan_date }}" type="datetime-local" id="plan_date" name="plan_date" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
        </div>
        @if($repair->currentHistory->application_id > 0)
            <div class="mb-3">
                <label for="id" class="form-label">ID заявки</label>
                <input type="text" class="form-control" id="application_id" name="application_id" value="{{ $repair->application_id }}" readonly>
            </div>
        @endif
        <div class="form-group">
            <label for="trk_id">ТОРГОВЫЙ КОМПЛЕКС</label>
            <select name="trk_id" id="trk_id" class="form-control">
                @forelse($trks as $trk)
                    <option @if($repair->trk->id === $trk->id) selected @endif
                    value="{{ $trk->id }}">{{ $trk->name }}</option>
                @empty
                    <option value="0">Нет комплексов в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="repair_status_id">СТАТУС</label>
            <select name="repair_status_id" id="repair_status_id" class="form-control">
                @forelse($repair_statuses as $status)
                    <option @if($repair->currentHistory->repair_status->id === $status->id) selected @endif
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
                    <option @if($repair->currentHistory->service->id === $service->id) selected @endif
                    value="{{ $service->id }}">{{ $service->name }}</option>
                @empty
                    <option value="0">Нет подразделений в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Создал</label>
            <select name="user_id" id="user_id" class="form-control">
                @forelse($users as $user)
                    <option @if($repair->currentHistory->user->id === $user->id) selected @endif
                    value="{{ $user->id }}">{{ $user->name }}</option>
                @empty
                    <option value="0">Нет пользователей в списке</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="responsible_user_id">Исполнитель</label>
            <select name="responsible_user_id" id="responsible_user_id" class="form-control">
                @forelse($users as $user)
                    <option @if($repair->currentHistory->user->id === $user->id) selected @endif
                    value="{{ $user->id }}">{{ $user->name }}</option>
                @empty
                    <option value="0">Нет пользователей в списке</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control" id="comment"
                      name="comment">{{ $repair->comment }}</textarea>
        </div>
        <a href="{{ route('admin.repairs.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
