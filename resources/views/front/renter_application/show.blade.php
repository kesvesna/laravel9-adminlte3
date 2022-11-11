@extends('front.layouts.main')

@section('title')
    @parent | Заявка
@endsection

@section('content')
<main>
    <div class="container-fluid pt-3" style="padding-bottom: 15vh;">
                <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );" class="pt-2 pb-3">
                    <div>
                        <div class="row col-12 mx-auto row-cols-1">
                            <div class="col">
                            <h4 style="color: white;">Заявка №22</h4>
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
                            <label for="system_id" class="form-label" style="color: white;">Вид работ</label>
                            <select disabled id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="1">Ввоз ТМЦ</option>
                                <option value="2">Вывоз ТМЦ</option>
                                <option value="3">Инвентаризация</option>
                                <option value="4">Разбор поставки</option>
                            </select>
                        </div>
                        <div class="col mt-3">
                            <label for="status_id" class="form-label" style="color: white;">Статус</label>
                            <select disabled id="status_id" name="status_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="1">Новая</option>
                                <option value="2">На рассмотрении</option>
                                <option value="3">Согласована</option>
                                <option value="4">Выполнена</option>
                                <option value="5">Отклонена</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-4">
                        <div class="col mt-3">
                            <label class="mb-2" for="work_start_time" style="color: white;">Дата и время начала работ:</label>
                            <br>
                            <input type="datetime-local" value="2017-06-01T08:30"  id="work_start_time" name="date" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                        </div>
                        <div class="col mt-3">
                            <label class="mb-2" for="work_finish_time" style="color: white;">Дата и время окончания работ:</label>
                            <br>
                            <input type="datetime-local" value="2017-06-02T08:30" id="work_finish_time" name="work_finish_time" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col mt-4">
                            <label for="comment" class="form-label" style="color: white;">Описание работ</label>
                            <textarea class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">Йа описание</textarea>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-3 row-cols-xxl-3">
                        <div class="col mt-3">
                            <label for="entity" class="form-label" style="color: white;">Юр. лицо</label>
                            <input class="form-control" type="text" id="entity" placeholder="ООО Рога и копыта" style="background: rgba( 255, 255, 255, 0.5 );">
                        </div>
                        <div class="col mt-3">
                            <label for="room_id" class="form-label" style="color: white;">Помещение</label>
                            <select id="room_id" name="room_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="1">B20</option>
                                <option value="2">C15</option>
                                <option value="3">D4</option>
                                <option value="4">E23</option>
                            </select>
                        </div>
                        <div class="col mt-3">
                            <label for="renter_brand_id" class="form-label" style="color: white;">Торговая марка</label>
                            <select id="renter_brand_id" name="renter_brand_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="1">Спорт Мастер</option>
                                <option value="2">Перекресток</option>
                                <option value="3">Intimissimi</option>
                                <option value="4">Samsung</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col mt-3">
                            <label for="persons_list" class="form-label" style="color: white;">Список лиц</label>
                            <textarea class="form-control" id="persons_list" name="persons_list" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">Иванов И.И., 89046137862; Петров П.П., 89046137862; Сидоров С.С.; 89046137862</textarea>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col mt-3">
                            <label for="responsible_person" class="form-label" style="color: white;">Ответственный</label>
                            <textarea class="form-control" id="responsible_person" name="responsible_person" rows="1" style="background: rgba( 255, 255, 255, 0.5 );">Алилуев А.А.; 89046137862</textarea>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 my-4">
                        <div class="col mt-3">
                            <label class="form-label" style="color: white;">Сканы</label>
                            <a href="{{ asset('dist/img/second.jpg') }}" target="_blank">
                                <img src="{{ asset('dist/img/second.jpg') }}" alt="Application image" class="col-12">
                            </a>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col mt-3">
                            <hr>
                            <h5>Если новая:</h5>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-3 row-cols-xxl-3">
                        <div class="col mt-3">
                            <button type="button" class="btn btn-success col-12 mb-3">Согласовать</button>
                        </div>
                        <div class="col mt-3">
                            <button type="button" class="btn btn-warning col-12 mb-3">Направить к инженерам</button>
                        </div>
                        <div class="col mt-3">
                            <button type="button" class="btn btn-danger col-12 mb-3">Отклонить</button>
                        </div>
                        <hr>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col mt-3">
                            <h5>После инженеров:</h5>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-5">
                        <div class="col mt-3">
                            <button type="button" class="btn btn-success col-12 mb-3">Согласовать</button>
                        </div>
                        <div class="col mt-3">
                            <button type="button" class="btn btn-danger col-12 mb-3">Отклонить</button>
                        </div>
                        <hr>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col mt-3">
                            <button onClick="history.back()" class="btn btn-success col-12" type="button">Назад</button>
                        </div>
                    </div>
                </form>
            </div>
    @include('front.components.navbar')
</main>
@endsection
