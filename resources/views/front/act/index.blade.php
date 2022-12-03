@extends('front.layouts.main')

@section('title')
    @parent | Акты
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
        <h5 style="color: white;" class="pt-3">Акты</h5>
        <table class="table table-bordered table-hover" style="background: rgba( 255, 255, 255, 0.1 );
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
                    Оборудование/Услуга
                </th>
                <th scope="col" style="width: 15%;"  class="d-none d-lg-table-cell">Помещение</th>
                <th scope="col">Наименование</th>
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
                        <option value="1">Вентиляция</option>
                        <option value="2">Кондиционирование</option>
                        <option value="3">Электрооборудование</option>
                    </select>
                </td>
                <td class="d-none d-lg-table-cell">
                    <input  style="background: rgba( 255, 255, 255, 0.5 );" name="room" type="search" class="form-control" placeholder="Поиск" aria-label="room" aria-describedby="room">
                </td>
                <td colspan="4">
                    <input  autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="equipment" type="search" class="form-control" placeholder="Поиск" aria-label="equipment" aria-describedby="equipment">
                </td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.acts.show') }}';" >
                <td class="d-none d-sm-table-cell">11-11-2022 14:54</td>
                <td class="d-none d-lg-table-cell">Академ Парк</td>
                <td class="d-none d-md-table-cell">Вентиляция</td>
                <td class="d-none d-lg-table-cell">ВК-12</td>
                <td>ПВ-9</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.acts.show') }}';" >
                <td class="d-none d-sm-table-cell">11-11-2022 12:57</td>
                <td class="d-none d-lg-table-cell">Родео Драйв</td>
                <td class="d-none d-md-table-cell">Кондиционирование</td>
                <td class="d-none d-lg-table-cell">B-13</td>
                <td>Ф-59</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.acts.show') }}';" >
                <td class="d-none d-sm-table-cell">11-11-2022 12:54</td>
                <td class="d-none d-lg-table-cell">Гудзон</td>
                <td class="d-none d-md-table-cell">Электрооборудование</td>
                <td class="d-none d-lg-table-cell">ГРЩ-2</td>
                <td>Розетка</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.acts.show') }}';" >
                <td class="d-none d-sm-table-cell">11-11-2022 12:54</td>
                <td class="d-none d-lg-table-cell">Гудзон</td>
                <td class="d-none d-md-table-cell">Электрооборудование</td>
                <td class="d-none d-lg-table-cell">ГРЩ-2</td>
                <td>Розетка</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.acts.show') }}';" >
                <td class="d-none d-sm-table-cell">11-11-2022 12:54</td>
                <td class="d-none d-lg-table-cell">Гудзон</td>
                <td class="d-none d-md-table-cell">Электрооборудование</td>
                <td class="d-none d-lg-table-cell">ГРЩ-2</td>
                <td>Розетка</td>
            </tr>
            </tbody>
        </table>
        <div class="row pb-2 d-flex flex-row-reverse pe-5">
            <a href="{{ route('front.acts.create') }}" style="width: 0">
                <img src="{{ asset('icons/plus.svg') }}" alt="Add picture" width="50" height="50">
            </a>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
