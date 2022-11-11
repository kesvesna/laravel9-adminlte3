@extends('front.layouts.main')

@section('title')
    @parent | Ремонты
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
        <h5 style="color: white;" class="pt-3">Ремонты</h5>
        <button class="btn btn-success btn-sm mb-2">Сброс фильтров</button>
        <table class="table table-bordered table-hover" style="background: rgba( 255, 255, 255, 0.1 );
    backdrop-filter: blur( 1px );
    -webkit-backdrop-filter: blur( 1px );
    border-radius: 5px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );">
            <thead>
            <tr>
                <th scope="col" style="width: 10%;" class="d-none d-sm-table-cell">Дата
                    <button class="btn">
                        <img class="" src="{{ asset('icons/arrow-down-up.svg') }}" alt="Arrow-down-up" width="20" height="20">
                    </button>
                </th>
                <th scope="col" style="width: 20%;"  class="d-none d-lg-table-cell">
                    ТРК
                </th>
                <th scope="col" style="width: 15%;"  class="d-none d-lg-table-cell">
                    Поздразделение
                </th>
                <th scope="col" style="width: 15%;" class="d-none d-md-table-cell">
                    Статус
                </th>
                <th scope="col">Задача</th>
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
                        <option value="1">СЭ ТРК</option>
                        <option value="2">Администрация</option>
                        <option value="3">ХВО</option>
                        <option value="3">ТСО</option>
                        <option value="3">АСУ</option>
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected>Все</option>
                        <option value="1">По плану</option>
                        <option value="2">По заявке</option>
                        <option value="3">Выполнен</option>
                        <option value="3">Отклонен</option>
                    </select>
                </td>
                <td colspan="4">
                    <input  autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="equipment" type="search" class="form-control" placeholder="Поиск" aria-label="equipment" aria-describedby="equipment">
                </td>
            </tr>
            <tr style="color: white;" onclick="window.location='{{ route('front.repair.show') }}';">
                <td class="d-none d-sm-table-cell">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell">Академ Парк</td>
                <td class="d-none d-lg-table-cell">ХВО</td>
                <td class="d-none d-md-table-cell">Выполнен</td>
                <td>Замена подшипников</td>
            </tr>
            <tr style="color: white;" onclick="window.location='{{ route('front.repair.show') }}';">
                <td class="d-none d-sm-table-cell">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell">Европолис</td>
                <td class="d-none d-lg-table-cell">СЭ</td>
                <td class="d-none d-md-table-cell">По заявке</td>
                <td>Приклеить плитку в туалете первого этажа</td>
            </tr>
            <tr style="color: white;" onclick="window.location='{{ route('front.repair.show') }}';">
                <td class="d-none d-sm-table-cell">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell">Европолис</td>
                <td class="d-none d-lg-table-cell">ХВО</td>
                <td class="d-none d-md-table-cell">По плану</td>
                <td>Замена вытяжки В-09-ОП</td>
            </tr>
            </tbody>
        </table>
        <div class="row pb-2 d-flex flex-row-reverse pe-5">
            <a href="{{ route('front.repair.create_by_plan') }}" style="width: 0">
                <img src="{{ asset('icons/plus.svg') }}" alt="Add picture" width="50" height="50">
            </a>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
