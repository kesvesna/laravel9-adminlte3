@extends('front.layouts.main')

@section('title')
    @parent | Новый акт
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
                <div class="d-flex justify-content-center">
                    <div class="col-10">
                        <h4 style="color: white;">Новый акт выполненных работ</h4>
                    </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label class="mb-2" for="date" style="color: white;">Дата и время:</label>
                        <br>
                        <input required type="datetime-local" id="date" name="date"  value="{{ Carbon\Carbon::now() }}" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                        <select id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Академ Парк</option>
                            <option value="2">Гудзон</option>
                            <option value="3">Европолис (м.Лесная)</option>
                            <option value="4">Родео Драйв</option>
                            <option value="5">Европолис (м.Ростокино)</option>
                        </select>
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="system_id" class="form-label" style="color: white;">Тип оборудования</label>
                        <select autofocus id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Вентиляция</option>
                            <option value="2">Кондиционирование</option>
                            <option value="3">Электроснабжение</option>
                            <option value="4">Водоотведение</option>
                        </select>
                    </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="building_id" class="form-label" style="color: white;">Блок/Зона</label>
                        <select id="building_id" name="building_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Блок 1</option>
                            <option value="2">Блок 2</option>
                            <option value="3">Блок 3</option>
                        </select>
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="floor_id" class="form-label" style="color: white;">Этаж</label>
                        <select id="floor_id" name="floor_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Парковка -2</option>
                            <option value="2">Парковка -1</option>
                            <option value="3">Этаж 1</option>
                            <option value="4">Этаж 2</option>
                        </select>
                    </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="room_id" class="form-label" style="color: white;">Помещение</label>
                        <select id="room_id" name="room_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">А-15</option>
                            <option value="2">В-23</option>
                            <option value="3">С-14</option>
                            <option value="4">D-22</option>
                        </select>
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="equipment_id" class="form-label" style="color: white;">Оборудование<wbr> (по&nbsp;проекту)</label>
                        <select id="equipment_id" name="equipment_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">ПВ-01-М</option>
                            <option value="2">ПВ-02-М</option>
                            <option value="3">ПВ-03-М</option>
                            <option value="4">ПВ-04-М</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="work_id" class="form-label" style="color: white;">Выполненные работы</label>
                        <select id="work_id" name="work_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Замена подшипников</option>
                            <option value="2">Сухая чистка калорифера</option>
                            <option value="3">Ремонт</option>
                            <option value="4">Замена воздушного панельного фильтра вытяжки</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Описание работ</label>
                        <textarea class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Замечания</label>
                        <textarea class="form-control" id="remark" name="remark" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Рекомендации</label>
                        <textarea class="form-control" id="recommendation" name="recommendation" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="user_id" class="form-label" style="color: white;">Исполнители</label>
                        <select id="user_id" name="user_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Иванов И.И.</option>
                            <option value="2">Петров П.П.</option>
                            <option value="3">Сидоров С.С.</option>
                        </select>
                    </div>
                </div>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-between col-11 mx-auto col-sm-10">
                    <button class="btn btn-danger col-sm-5" type="button">Сохранить</button>
                    <button onClick="history.back()" class="btn btn-success col-sm-5" type="button">Назад</button>
                </div>
            </form>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
