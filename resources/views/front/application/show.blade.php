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
                            <h4 style="color: white;">Заявка</h4>
                                </div>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <div class="col mt-3">
                            <label for="date" class="form-label" style="color: white;">Дата/Время</label>
                            <input disabled type="datetime-local" value="2017-06-01T08:30" id="date" name="date" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                        </div>
                        <div class="col mt-3">
                            <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                            <select disabled id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="1">Академ Парк</option>
                                <option value="2">Гудзон</option>
                                <option value="3">Европолис (м.Лесная)</option>
                                <option value="4">Родео Драйв</option>
                                <option value="5">Европолис (м.Ростокино)</option>
                            </select>
                        </div>
                        <div class="col mt-3">
                            <label for="system_id" class="form-label" style="color: white;">Подразделение</label>
                            <select disabled id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="1">Служба эксплуатации</option>
                                <option value="2">Администрация</option>
                                <option value="3">ХВО</option>
                                <option value="4">АСУ</option>
                            </select>
                        </div>
                        <div class="col mt-3">
                            <label for="status_id" class="form-label" style="color: white;">Статус заявки</label>
                            <select disabled id="status_id" name="status_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="1">Новая</option>
                                <option value="2">В обработке</option>
                                <option value="3">Ремонт</option>
                                <option value="4">Выполнена</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 mt-3">
                        <div class="col">
                            <label for="comment" class="form-label" style="color: white;">Проблема/Задача</label>
                            <textarea disabled class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 my-4">
                        <div class="col">
                            <a href="{{ asset('dist/img/second.jpg') }}" target="_blank">
                                <img src="{{ asset('dist/img/second.jpg') }}" alt="Application image" class="col-12">
                            </a>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col">
                            <hr>
                            <h5>Если новая:</h5>
                        </div>
                    </div>
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
                        <hr>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col">
                            <h5>Если в обработке:</h5>
                        </div>
                    </div>
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
                        <hr>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col">
                            <h5>Если в ремонте:</h5>
                        </div>
                    </div>
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
