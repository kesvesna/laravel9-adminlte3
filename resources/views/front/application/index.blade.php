@extends('front.layouts.main')

@section('title')
    @parent | Заявки
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
        <div class="row col-12 mx-auto row-cols-1 pt-2">
            <div class="col">
                <h5 style="color: white;">Заявки</h5>
            </div>
            <div class="col pt-2">
                <button class="btn btn-success btn-sm">Сброс фильтров</button>
            </div>
            </div>
        <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 pt-2 d-md-none">
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
            <div class="col pt-2">
                <label for="system_id" class="form-label" style="color: white;">Подразделение</label>
                <select id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                    <option value="1">Служба эксплуатации</option>
                    <option value="2">Администрация</option>
                    <option value="3">ХВО</option>
                    <option value="4">АСУ</option>
                </select>
            </div>
            <div class="col pt-2">
                <label for="status_id" class="form-label" style="color: white;">Статус заявки</label>
                <select id="status_id" name="status_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                    <option value="1">Новая</option>
                    <option value="2">В обработке</option>
                    <option value="3">Ремонт</option>
                    <option value="4">Выполнена</option>
                    <option value="5">Отклонена</option>
                </select>
            </div>
        </div>
        <table class="table table-bordered table-hover mt-4" style="background: rgba( 255, 255, 255, 0.1 );
    backdrop-filter: blur( 1px );
    -webkit-backdrop-filter: blur( 1px );
    border-radius: 5px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );">
            <thead>
            <tr>
                <th scope="col" style="width: 15%;" class="d-none d-sm-table-cell">Дата
                    <button class="btn">
                        <img class="" src="{{ asset('icons/arrow-down-up.svg') }}" alt="Arrow-down-up" width="20" height="20">
                    </button>
                </th>
                <th scope="col" style="width: 20%;"  class="d-none d-lg-table-cell">
                    ТРК
                </th>
                <th scope="col" style="width: 20%;" class="d-none d-md-table-cell">
                    Статус
                </th>
                <th scope="col" style="width: 15%;"  class="d-none d-md-table-cell">Подразделение</th>
                <th scope="col" colspan="4">Проблема/Задача</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="d-none d-sm-table-cell">
                    <input  style="background: rgba( 255, 255, 255, 0.5 );" name="date" type="datetime-local" class="form-control" placeholder="Поиск" aria-label="date" aria-describedby="date">
                </td>
                <td class="d-none d-lg-table-cell">
                    <select class="form-select" aria-label="trk" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected>Все</option>
                        <option value="1">Академ Парк</option>
                        <option value="2">Родео Драйв</option>
                        <option value="3">Гудзон</option>
                        <option value="4">Европолис (м.Ростокино)</option>
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected>Все</option>
                        <option value="1">Новые</option>
                        <option value="2">В обработке</option>
                        <option value="3">Ремонт</option>
                        <option value="3">Выполнены</option>
                        <option value="3">Отклонены</option>
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected>Все</option>
                        <option value="1">СЭ ТРК</option>
                        <option value="2">Администрация</option>
                        <option value="3">ХВО</option>
                        <option value="3">ТСО</option>
                        <option value="3">АСУ</option>
                    </select>
                </td>
                <td colspan="4">
                    <input  autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="equipment" type="search" class="form-control" placeholder="Поиск" aria-label="equipment" aria-describedby="equipment">
                </td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.application.show') }}';">
                <td class="d-none d-sm-table-cell">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell">Академ Парк</td>
                <td class="d-none d-md-table-cell">Закрыта</td>
                <td class="d-none d-md-table-cell">АСУ</td>
                <td>Изменить расписание наружного освещения</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.application.show') }}';">
                <td class="d-none d-sm-table-cell">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell">Европолис</td>
                <td class="d-none d-md-table-cell">Закрыта</td>
                <td class="d-none d-md-table-cell">СЭ ТРК</td>
                <td>Отвалилась плитка в туалете первого этажа</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.application.show') }}';">
                <td class="d-none d-sm-table-cell">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell">Европолис</td>
                <td class="d-none d-md-table-cell">Новая</td>
                <td class="d-none d-md-table-cell">ХВО</td>
                <td>Течет вода из кондиционера у арендатора Massimo Rene</td>
            </tr>
            </tbody>
        </table>
            <div class="row pb-2 d-flex flex-row-reverse pe-5">
                <a href="{{ route('front.application.create') }}" style="width: 0">
                    <img src="{{ asset('icons/plus.svg') }}" alt="Add picture" width="50" height="50">
                </a>
            </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
