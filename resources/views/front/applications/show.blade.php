@extends('front.layouts.main')

@section('title')
    @parent | Заявка
@endsection

@section('content')
<main>
    <div class="container-fluid">
        <div class="container" style="padding-bottom: 15vh;">
                    <div>
                        <div class="row col-12 mx-auto row-cols-1">
                            <div class="col">
                            <h5 style="color: white;" class="mt-4">Заявка № {{ $application->id }}, {{ $application->currentHistory->application_status->name }}</h5>
                                </div>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3">
                        <div class="col mt-2">
                            <input disabled type="datetime-local" value="{{ $application->created_at }}" id="created_at" name="created_at" class="form-control" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold">
                        </div>
                        <div class="col mt-2">
                            <select disabled id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                                <option value="">{{ $application->trk->name }}</option>
                            </select>
                        </div>
                        <div class="col mt-2">
                            <select disabled id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                                <option value="">{{ $application->currentHistory->service->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 mt-2">
                        <div class="col">
                            <textarea disabled class="form-control" id="comment" name="comment" rows="3" style="background: rgba( 255, 255, 255, 0.5 );">{{ $application->comment }}</textarea>
                        </div>
                    </div>
                    @if(isset($application->medias))
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-{{ count($application->medias) }} my-2">
                        @forelse($application->medias as $media)
                            <div class="col my-2">
                                <a href="{{ Storage::disk('public')->url($media->name) }}" target="_blank">
                                    <img class="img-thumbnail" src="{{ Storage::disk('public')->url($media->name) }}" alt="Application file"></a>
                            </div>
                           @empty
                        @endforelse
                    </div>
                    @endif
                    <div class="row col-12 mx-auto row-cols-1 mb-2">
                        <div class="col">
                            <div class="form-check">
                                <input disabled class="form-check-input" type="checkbox" id="notify_author" name="notify_author" value="on"
                                    {{ $application->notify_author == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="notify_author">
                                    Оповещение автора
                                </label>
                            </div>
                        </div>
                    </div>

                    @if(isset($application->histories) && count($application->histories) > 0)
                        <div class="row col-12 mx-auto row-cols-1 my-2">
                        <h6 style="color: white;">История заявки</h6>
                        @forelse($application->histories as $history)
                            <div class="col">
                                <p style="color: white;">{{ $history->created_at }}, {{ $history->application_status->name }},  {{ $history->service->name }}, от {{ $history->user->name }}, @if(isset($history->responsible_user->id)) {{ "ответственный: " . $history->responsible_user->name . ',' }}  @endif{{$history->comment }}</p>
                            </div>
                            @empty
                        @endforelse
                        </div>
                    @endif

                    @if($application->currentHistory->application_status->id == $application::NEW)
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <div class="col">
                            <form action="{{ route('front.applications.accept', $application->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success col-12 mb-3"><b>Принять</b></button>
                            </form>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3" data-bs-toggle="modal" data-bs-target="#redirectApplicationModal"><b>Перенаправить</b></button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3" data-bs-toggle="modal" data-bs-target="#appointApplicationModal"><b>Назначить исполнителя</b></button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger col-12 mb-3" data-bs-toggle="modal" data-bs-target="#rejectApplicationModal"><b>Отклонить</b></button>
                        </div>
                    </div>
                    @endif

                    @if($application->currentHistory->application_status->id == $application::IN_PROGRESS)
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-5">
                        <form action="{{ route('front.act.create_by_application_all_done', $application->id) }}" method="post">
                            @csrf
                            <div class="col">
                                <button type="submit" class="btn btn-success col-12 mb-3"><b>Выполнена</b></button>
                            </div>
                        </form>
                        <form action="{{ route('front.act.create_by_application_not_completely_done', $application->id) }}" method="post">
                            @csrf
                        <div class="col">
                            <button type="submit" class="btn btn-warning col-12 mb-3"><b>Выполнена частично</b></button>
                        </div>
                        </form>
                        <form action="{{ route('front.repair.create_by_application', $application->id) }}" method="post">
                            @csrf
                        <div class="col">
                            <button type="submit" class="btn btn-warning col-12 mb-3"><b>В ремонт</b></button>
                        </div>
                        </form>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3" data-bs-toggle="modal" data-bs-target="#redirectApplicationModal"><b>Перенаправить</b></button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3" data-bs-toggle="modal" data-bs-target="#appointApplicationModal"><b>Назначить исполнителя</b></button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger col-12 mb-3" data-bs-toggle="modal" data-bs-target="#rejectApplicationModal"><b>Отклонить</b></button>
                        </div>
                    </div>
                    @endif

                    @if($application->currentHistory->application_status_id == $application::REPAIR)
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <form action="{{ route('front.act.create_by_application_all_done', $application->id) }}" method="post">
                        @csrf
                            <div class="col">
                            <button type="submit" class="btn btn-success col-12 mb-3"><b>Выполнена</b></button>
                        </div>
                        </form>
                        <form action="{{ route('front.act.create_by_application_not_completely_done', $application->id) }}" method="post">
                            @csrf
                        <div class="col">
                            <button type="submit" class="btn btn-warning col-12 mb-3"><b>Выполнена частично</b></button>
                        </div>
                        </form>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3" data-bs-toggle="modal" data-bs-target="#redirectApplicationModal"><b>Перенаправить</b></button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3" data-bs-toggle="modal" data-bs-target="#appointApplicationModal"><b>Назначить исполнителя</b></button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger col-12 mb-3" data-bs-toggle="modal" data-bs-target="#rejectApplicationModal"><b>Отклонить</b></button>
                        </div>
                    </div>
                    @endif
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col">
                            <button onClick="history.back()" class="btn btn-success col-12" type="button"><b>Назад</b></button>
                        </div>
                    </div>
            </div>
        </div>
    <!-- Redirect Modal -->
    <div class="modal fade" id="redirectApplicationModal" tabindex="-1" aria-labelledby="redirectApplicationModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('front.applications.redirect', $application->id) }}" method="post">
                @csrf
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="redirectApplicationModal">Перенаправление заявки</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="service_id">Куда перенаправить</label>
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
    <!-- Reject Modal -->
    <div class="modal fade" id="rejectApplicationModal" tabindex="-1" aria-labelledby="rejectApplicationModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('front.applications.reject', $application->id) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectApplicationModal">Отклонение заявки</h5>
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
    <!-- Appoint Modal -->
    <div class="modal fade" id="appointApplicationModal" tabindex="-1" aria-labelledby="appointApplicationModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('front.applications.appoint', $application->id) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointApplicationModal">Назначение ответственного за выполнение заявки</h5>
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
    @include('front.components.navbar')
</main>
@endsection
