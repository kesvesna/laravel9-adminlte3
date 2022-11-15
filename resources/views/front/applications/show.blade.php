@extends('front.layouts.main')

@section('title')
    @parent | Заявка
@endsection

@section('content')
<main>
    <div class="container-fluid">
        <div class="container pt-3" style="padding-bottom: 15vh;">
                <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );" class="pt-2 pb-3">
                    <div>
                        <div class="row col-12 mx-auto row-cols-1">
                            <div class="col">
                            <h4 style="color: white;">Заявка №{{ $application->id }}</h4>
                                </div>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <div class="col mt-3">
                            <label for="date" class="form-label" style="color: white;">Дата/Время</label>
                            <input disabled type="datetime-local" value="{{ $application->created_at }}" id="created_at" name="created_at" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                        </div>
                        <div class="col mt-3">
                            <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                            <select disabled id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="">{{ $application->trk->name }}</option>
                            </select>
                        </div>
                        <div class="col mt-3">
                            <label for="system_id" class="form-label" style="color: white;">Подразделение</label>
                            <select disabled id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="">{{ $application->service->name }}</option>
                            </select>
                        </div>
                        <div class="col mt-3">
                            <label for="status_id" class="form-label" style="color: white;">Статус заявки</label>
                            <select disabled id="status_id" name="status_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="">{{ $application->application_status->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 mt-3">
                        <div class="col">
                            <label for="comment" class="form-label" style="color: white;">Проблема/Задача</label>
                            <textarea disabled class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{ $application->comment }}</textarea>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-{{ count($application->media) }} my-2">
                        @forelse($application->media as $media)
                            <div class="col my-2">
                                <a href="{{ Storage::disk('public')->url($media->name) }}" target="_blank">
                                    <img class="img-thumbnail" src="{{ Storage::disk('public')->url($media->name) }}" alt="Application file"></a>
                            </div>
                           @empty
                        @endforelse
                    </div>
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

                    @if($application->application_status_id == 1)
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <div class="col">
                            <button type="button" class="btn btn-success col-12 mb-3">Принять</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">Перенаправить</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">Назначить исполнителя</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger col-12 mb-3">Отклонить</button>
                        </div>
                    </div>
                    @endif

                    @if($application->application_status_id == 2)
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-5">
                        <div class="col">
                            <button type="button" class="btn btn-success col-12 mb-3">Выполнена</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">В ремонт</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">Перенаправить</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">Назначить исполнителя</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger col-12 mb-3">Отклонить</button>
                        </div>
                    </div>
                    @endif

                    @if($application->application_status_id == 3)
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <div class="col">
                            <button type="button" class="btn btn-success col-12 mb-3">Выполнена</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">Перенаправить</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-warning col-12 mb-3">Назначить исполнителя</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger col-12 mb-3">Отклонить</button>
                        </div>
                    </div>
                    @endif

                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col">
                            <button onClick="history.back()" class="btn btn-success col-12" type="button">Назад</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @include('front.components.navbar')
</main>
@endsection
