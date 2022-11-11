@extends('front.layouts.main')

@section('title')
    @parent | Заявки
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
        <div class="row col-12 mx-auto row-cols-1 pt-2">
            <div class="col">
                <h5 style="color: white;">Заявки от арендаторов</h5>
            </div>
            <div class="col pt-2">
                <button class="btn btn-success btn-sm">Сброс фильтров</button>
            </div>
            </div>
        <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 d-md-none">
            <div class="col mb-2 pt-2">
                <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                <select id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                    <option value="1">Академ Парк</option>
                    <option value="2">Гудзон</option>
                    <option value="3">Европолис (м.Лесная)</option>
                    <option value="4">Родео Драйв</option>
                    <option value="5">Европолис (м.Ростокино)</option>
                </select>
            </div>
            <div class="col">
                <label for="brand_id" class="form-label" style="color: white;">Арендатор</label>
                <select class="form-select" aria-label="brand_id" id="brand_id" style="background: rgba( 255, 255, 255, 0.5 );" >
                    <option selected>Все</option>
                    <option value="1">Рив Гош</option>
                    <option value="2">Samsung</option>
                    <option value="3">Спорт мастер</option>
                    <option value="4">Guess</option>
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
                <th scope="col" class="d-none d-sm-table-cell">Дата
                    <button class="btn">
                        <img class="" src="{{ asset('icons/arrow-down-up.svg') }}" alt="Arrow-down-up" width="20" height="20">
                    </button>
                </th>
                <th scope="col" class="d-none d-lg-table-cell">
                    ТРК
                </th>
                <th scope="col">
                    Статус
                </th>
                <th scope="col" class="d-none d-md-table-cell">Помещение</th>
                <th scope="col" class="d-none d-md-table-cell">Бренд</th>
                <th scope="col">Вид работ</th>
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
                <td>
                    <select class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected>Все</option>
                        <option value="1">Новые</option>
                        <option value="2">Согласование у инженеров</option>
                        <option value="3">Отклонены</option>
                        <option value="4">Согласованы</option>
                        <option value="4">Выполнены</option>
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select class="form-select" aria-label="room" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected>Все</option>
                        <option value="1">B1</option>
                        <option value="2">C2</option>
                        <option value="3">D15</option>
                        <option value="4">E23</option>
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected>Все</option>
                        <option value="1">Перекресток</option>
                        <option value="2">Samsung</option>
                        <option value="3">Рив Гош</option>
                        <option value="3">Линз Мастер</option>
                        <option value="3">Сбербанк</option>
                    </select>
                </td>
                <td>
                    <select class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );">
                        <option selected>Все</option>
                        <option value="1">Ввоз ТМЦ</option>
                        <option value="2">Вывоз ТМЦ</option>
                        <option value="3">Инвентаризация</option>
                        <option value="4">Разбор поставки</option>
                        <option value="5">Переоценка</option>
                    </select>
                </td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.renter_application.show') }}';">
                <td class="d-none d-sm-table-cell" style="background: rgba(250, 7, 7, 0.1);">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell" style="background: rgba(250, 7, 7, 0.1);">Академ Парк</td>
                <td style="background: rgba(250, 7, 7, 0.1);">Новая</td>
                <td class="d-none d-md-table-cell" style="background: rgba(250, 7, 7, 0.1);">B15</td>
                <td class="d-none d-md-table-cell" style="background: rgba(250, 7, 7, 0.1);">Перекресток</td>
                <td style="background: rgba(250, 7, 7, 0.1);">Ввоз ТМЦ</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.renter_application.show') }}';">
                <td class="d-none d-sm-table-cell" style="background: rgba(7, 250, 7, 0.1);">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell" style="background: rgba(7, 250, 7, 0.1);">Европолис</td>
                <td style="background: rgba(7, 250, 7, 0.1);">Выполнена</td>
                <td class="d-none d-md-table-cell" style="background: rgba(7, 250, 7, 0.1);">C15</td>
                <td class="d-none d-md-table-cell" style="background: rgba(7, 250, 7, 0.1);">Леонардо да Винчи</td>
                <td style="background: rgba(7, 250, 7, 0.1);">Вывоз ТМЦ</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.renter_application.show') }}';">
                <td class="d-none d-sm-table-cell" style="background: rgba(250, 232, 7, 0.1);">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell" style="background: rgba(250, 232, 7, 0.1);">Европолис</td>
                <td style="background: rgba(250, 232, 7, 0.1);">Согласование у инженеров</td>
                <td class="d-none d-md-table-cell" style="background: rgba(250, 232, 7, 0.1);">A4</td>
                <td class="d-none d-md-table-cell" style="background: rgba(250, 232, 7, 0.1);">Рив Гош</td>
                <td style="background: rgba(250, 232, 7, 0.1);">Инвентаризация</td>
            </tr>
            <tr style="color: white;"  onclick="window.location='{{ route('front.renter_application.show') }}';">
                <td class="d-none d-sm-table-cell" style="background: rgba(250, 7, 7, 0.1);">11-11-2022 10:23</td>
                <td class="d-none d-lg-table-cell" style="background: rgba(250, 7, 7, 0.1);">Европолис</td>
                <td style="background: rgba(250, 7, 7, 0.1);">Отклонена</td>
                <td class="d-none d-md-table-cell" style="background: rgba(250, 7, 7, 0.1);">В4</td>
                <td class="d-none d-md-table-cell" style="background: rgba(250, 7, 7, 0.1);">Буше</td>
                <td style="background: rgba(250, 7, 7, 0.1);">Инвентаризация</td>
            </tr>
            </tbody>
        </table>
            <div class="row pb-2 d-flex flex-row-reverse pe-5">
                <a href="{{ route('front.renter_application.create') }}" style="width: 0">
                    <img src="{{ asset('icons/plus.svg') }}" alt="Add picture" width="50" height="50">
                </a>
            </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
