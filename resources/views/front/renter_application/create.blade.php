@extends('front.layouts.main')

@section('title')
    @parent | Новая заявка
@endsection

@section('content')
<main>
    <div class="container-fluid pt-3" style="padding-bottom: 15vh;">
            <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );"
                  class="pt-2 pb-3">
                <div class="row col-12 mx-auto row-cols-1">
                    <div class="col">
                        <h4 style="color: white;">Новая заявка</h4>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-2">
                    <div class="col">
                        <label for="renter_work_type_id" class="form-label" style="color: white;">Виды работ</label>
                        <select autofocus id="renter_work_type_id" name="renter_work_type_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Ввоз ТМЦ</option>
                            <option value="2">Вывоз ТМЦ</option>
                            <option value="3">Инвентаризация</option>
                            <option value="4">Разбор поставки</option>
                            <option value="5">Переоценка</option>
                            <option value="6">Монтаж</option>
                            <option value="7">Демонтаж</option>
                            <option value="8">Уборка</option>
                            <option value="9">Ремонт</option>
                            <option value="10" style="color: yellowgreen">Изготовление магнитной карты</option>
                            <option value="11" style="color: yellowgreen">Промоакция</option>
                            <option value="12" style="color: yellowgreen">Подать список сотрудников</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                        <select id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                            <option value="1">Академ Парк</option>
                            <option value="2">Гудзон</option>
                            <option value="3">Европолис (м.Лесная)</option>
                            <option value="4">Родео Драйв</option>
                            <option value="5">Европолис (м.Ростокино)</option>
                        </select>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-2">
                    <div class="col mt-4">
                        <label class="mb-2" for="work_start_time" style="color: white;">Начало работ:</label>
                        <br>
                        <input type="datetime-local" id="work_start_time" name="date" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col mt-4">
                        <label class="mb-2" for="work_finish_time" style="color: white;">Окончание работ:</label>
                        <br>
                        <input type="datetime-local" id="work_finish_time" name="work_finish_time" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1">
                    <div class="col mt-4">
                        <label for="comment" class="form-label" style="color: white;">Описание работ</label>
                        <textarea required class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1">
                    <div class="col mt-4">
                        <label for="persons_list" class="form-label" style="color: white;">Список лиц</label>
                        <textarea required class="form-control" placeholder="ФИО, тел. ; ФИО, тел. ;" id="persons_list" name="persons_list" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1">
                    <div class="col mt-4">
                        <label for="responsible_person" class="form-label" style="color: white;">Ответственный</label>
                        <textarea required class="form-control" placeholder="ФИО, тел." id="responsible_person" name="responsible_person" rows="1" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1">
                    <div class="col mt-4">
                        <label for="file" class="form-label" style="color: white;">Сканы</label>
                        <input class="form-control" type="file" id="file" name="file" multiple>
                        </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1">
                    <div class="col mt-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Оповещать меня
                    </label>
                </div>
                    </div>
                </div>
                <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-2">
                    <div class="col mt-4">
                        <button class="btn btn-danger col-12" type="button">Сохранить</button>
                    </div>
                    <div class="col mt-4">
                        <button onClick="history.back()" class="btn btn-success col-12" type="button">Назад</button>
                    </div>
                </div>
            </form>
        </div>
    @include('front.components.navbar')
</main>
@endsection
