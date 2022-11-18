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
                            <h4 style="color: white;">Ремонт № {{ $repair->id }} по заявке № {{ $repair->application_id }}</h4>
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
                <div class="mt-3 row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                    <div class="col">
                        <button type="button" class="btn btn-success col-12 mb-3">Выполнен</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-warning col-12 mb-3">Выполнен частично</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-warning col-12 mb-3">Назначить исполнителя</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-danger col-12 mb-3">Отклонить</button>
                    </div>
                    <hr>
                </div>
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
