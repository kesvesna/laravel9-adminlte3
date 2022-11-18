@extends('front.layouts.main')

@section('title')
    @parent | Ремонт
@endsection

@section('content')
<main>
    <div class="container-fluid">
        <div class="container pt-3" style="padding-bottom: 15vh;">
            <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );"
                  class="pt-2 pb-3">
                <div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col">
                            <h4 style="color: white;">Ремонт № {{ $repair->id }}@if($repair->application_id) по заявке № {{ $repair->application_id }}@endif</h4>
                        </div>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                    <div class="col mt-3">
                        <label for="date" class="form-label" style="color: white;">Должен начаться</label>
                        <input disabled type="datetime-local" value="{{ $repair->plan_date }}" id="plan_date" name="plan_date" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col mt-3">
                        <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                        <select id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="{{ $repair->trk->id }}">{{ $repair->trk->name }}</option>
                        </select>
                    </div>
                    <div class="col mt-3">
                        <label for="service_id" class="form-label" style="color: white;">Подразделение</label>
                        <select id="service_id" name="service_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="{{ $repair->service->id }}">{{ $repair->service->name }}</option>
                        </select>
                    </div>
                    <div class="col mt-3">
                        <label for="status_id" class="form-label" style="color: white;">Статус ремонта</label>
                        <select id="status_id" name="status_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="{{ $repair->repair_status->id }}">{{ $repair->repair_status->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1 mt-3">
                    <div class="col">
                        <label for="comment" class="form-label" style="color: white;">Задача</label>
                        <textarea disabled class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{ $repair->comment }}
                        </textarea>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1 row-cols-md-{{ count($repair->media) }} my-2">
                    @forelse($repair->media as $media)
                        <div class="col my-2">
                            <a href="{{ Storage::disk('public')->url($media->name) }}" target="_blank">
                                <img class="img-thumbnail" src="{{ Storage::disk('public')->url($media->name) }}" alt="Repair file"></a>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                    <div class="col mb-3">
                        <label for="user_id" class="form-label" style="color: white;">Ремонт запланировал</label>
                        <input disabled type="text" value="{{ $repair->user->name }}" id="user_id" name="user_id" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col mb-3">
                        <label for="responsible_user_id" class="form-label" style="color: white;">Исполнитель</label>
                        <input disabled type="text" value="{{ $repair->responsible_user->name }}" id="responsible_user_id" name="responsible_user_id" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                </div>
                @if(isset($repair->history) && count($repair->history) > 0)
                    <div class="row col-12 mx-auto row-cols-1 my-2">
                        <h6 style="color: white;">История ремонта</h6>
                        @forelse($repair->history as $history)
                            <div class="col">
                                <p style="color: white;">{{ $history->created_at }}, {{ $history->repair_status->name }},  {{ $history->service->name }}, {{ $history->user_id }}, {{ $history->comment }}</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                @endif
                @if($repair->repair_status_id == $repair::BY_PLAN || $repair->repair_status_id == $repair::BY_APPLICATION ||  $repair->repair_status_id == $repair::IN_PROGRESS)
                    <div class="mt-3 row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <div class="col">
                            <button type="button" class="btn btn-success col-12 mb-3">Выполнен</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">Выполнен частично</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3" data-bs-toggle="modal" data-bs-target="#appointRepairModal">Назначить исполнителя</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger col-12 mb-3" data-bs-toggle="modal" data-bs-target="#rejectRepairModal">Отклонить</button>
                        </div>
                    </div>
                @endif
                <div class="row col-12 mx-auto row-cols-1 mt-2">
                    <div class="col">
                        <button onClick="history.back()" class="btn btn-success col-12" type="button">Назад</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Appoint Modal -->
    <div class="modal fade" id="appointRepairModal" tabindex="-1" aria-labelledby="appointRepairModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('front.repair.appoint', $repair->id) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointRepairModal">Назначение ответственного за выполнение ремонта</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="responsible_user_id">Кого назначить</label>
                            <select name="responsible_user_id" id="responsible_user_id" class="form-control">
                                @forelse($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option value="0">Нет пользователей в списке</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Комментарий</label>
                            <textarea required type="text" class="form-control" id="comment"
                                      name="comment"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Reject Modal -->
    <div class="modal fade" id="rejectRepairModal" tabindex="-1" aria-labelledby="rejectRepairModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('front.repair.reject', $repair->id) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectRepairModal">Отклонение ремонта</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Причина</label>
                            <textarea required type="text" class="form-control" id="comment"
                                      name="comment"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
