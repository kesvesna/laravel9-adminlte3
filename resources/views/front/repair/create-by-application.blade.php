@extends('front.layouts.main')

@section('title')
    @parent | Ремонт по заявке
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
                @method('post')
                <div class="d-flex justify-content-center">
                    <div class="col-10">
                        <h4 style="color: white;">Ремонт по заявке № {{ $application->id }}</h4>
                    </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label class="mb-2" for="date" style="color: white;">Когда начнется ремонт</label>
                        <br>
                        <input type="datetime-local" id="date" name="date" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                    </div>
                </div>
                <div class="mb-3 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                        <select disabled id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="{{ $application->trk->id }}">{{ $application->trk->name }}</option>
                        </select>
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="system_id" class="form-label" style="color: white;">Подразделение</label>
                        <select disabled id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="{{ $application->service->id }}">{{ $application->service->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Задача</label>
                        <textarea class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{ $application->comment }}</textarea>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
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
