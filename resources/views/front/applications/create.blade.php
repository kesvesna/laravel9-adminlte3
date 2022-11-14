@extends('front.layouts.main')

@section('title')
    @parent | Создание заявки
@endsection

@section('content')
<main>
    <div class="container-fluid d-flex align-items-center pt-3 pt-lg-0 pb-5 pb-lg-0">
        <div class="container pb-4 pb-lg-0">
            <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );"
                  class="pt-2 pb-3" method="post" action="{{ route('front.applications.store') }}">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="col-10">
                        <h4 style="color: white;">Новая заявка</h4>
                    </div>
                </div>
                <div class="mb-3 d-lg-flex justify-content-around">
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
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto mt-2">
                        <label for="service_id" class="form-label" style="color: white;">Подразделение</label>
                        <select autofocus id="service_id" name="service_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            @forelse($services as $service)
                                <option  @if(isset($old_filters['service_id'])){{ $old_filters['service_id'] == $service->id ? ' selected' : '' }} @endif value="{{ $service->id }}">{{ $service->name }}</option>
                            @empty
                                Нет подразделений
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Проблема/Задача</label>
                        <textarea class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{ old('comment') }}</textarea>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="notify_author" name="notify_author" value="on"
                        {{ old('notify_author') == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="notify_author">
                        Оповещать меня
                    </label>
                </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-between col-11 mx-auto col-sm-10">
                    <button class="btn btn-danger col-sm-5" type="submit">Сохранить</button>
                    <button onClick="history.back()" class="btn btn-success col-sm-5" type="button">Назад</button>
                </div>
            </form>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
