@extends('front.layouts.main')

@section('title')
    @parent | Ремонт по плану
@endsection

@section('content')
<main>
    <div class="container-fluid">
        <div class="container pt-3" style="padding-bottom: 15vh;">
            <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );" class="pt-2 pb-3" method="post" action="{{ route('front.repair.store') }}" enctype="multipart/form-data">
                @csrf
                <input value="" hidden name="application_id">
                <div class="d-flex justify-content-center">
                    <div class="col-10">
                        <h4 style="color: white;">Новый плановый ремонт</h4>
                    </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label class="mb-2" for="plan_date" style="color: white;">Когда начнется ремонт</label>
                        <br>
                        <input value="{{date('Y-m-d\TH:i')}}" type="datetime-local" id="plan_date" name="plan_date" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                        <select id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            @forelse($trks as $trk)
                                <option @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif value="{{ $trk->id }}">{{ $trk->name }}</option>
                            @empty
                                Нет трк
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto mb-3">
                        <label for="service_id" class="form-label" style="color: white;">Подразделение</label>
                        <select autofocus id="service_id" name="service_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            @forelse($services as $service)
                                <option  @if(isset($old_filters['service_id'])){{ $old_filters['service_id'] == $service->id ? ' selected' : '' }} @endif value="{{ $service->id }}">{{ $service->name }}</option>
                            @empty
                                Нет подразделений
                            @endforelse
                        </select>
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="responsible_user_id" class="form-label" style="color: white;">Исполнитель</label>
                        <select autofocus id="responsible_user_id" name="responsible_user_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            @forelse($users as $user)
                                <option  @if(isset($old_filters['responsible_user_id'])){{ $old_filters['responsible_user_id'] == $user->id ? ' selected' : '' }} @endif value="{{ $user->id }}">{{ $user->name }}</option>
                            @empty
                                Нет исполнителей
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Задача</label>
                        <textarea class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <input class="form-control" type="file" id="files" multiple name="files[]" accept="image/*, video/*, audio/*">
                    </div>
                </div>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-between col-11 mx-auto col-sm-10">
                    <button class="btn btn-danger col-sm-5" type="submit">Сохранить</button>
                    <button onClick="history.back()"  class="btn btn-success col-sm-5" type="button">Назад</button>
                </div>
            </form>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
