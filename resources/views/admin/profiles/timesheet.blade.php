@extends('admin.layouts.admin')

@section('title')
    @parent Табель
@endsection

@section('content')
<?php

function getBetweenDates($startDate, $endDate)
{
    $rangArray = [];

    $startDate = strtotime($startDate);
    $endDate = strtotime($endDate);

    for ($currentDate = $startDate; $currentDate <= $endDate;
         $currentDate += (86400)) {

        $date = date('Y-m-d', $currentDate);
        $rangArray[] = $date;
    }

    return $rangArray;
}


function getFirstDay($date)
{
    $month = intval(date('m', strtotime($date)));
    $year = intval(date('Y', strtotime($date)));

    return $year . "-" . $month . "-01";
}

function getLastDay($date)
{
    $month = intval(date('m', strtotime($date)));
    $year = intval(date('Y', strtotime($date)));

    $days_count = cal_days_in_month(0, $month, $year);

    return $year . "-" . $month . "-" . $days_count;
}

$date = '2022-11';

$first_day = getFirstDay($date);
$last_day = getLastDay($date);

$dates = getBetweenDates($first_day, $last_day);

$days = [
    'Воскресенье',
    'Понедельник',
    'Вторник',
    'Среда',
    'Четверг',
    'Пятница',
    'Суббота'
];

$months = [
        'null',
    'Январь',
    'Февраль',
    'Март',
    'Апрель',
    'Май',
    'Июнь',
    'Июль',
    'Август',
    'Сентябрь',
    'Октябрь',
    'Ноябрь',
    'Декабрь'
];

$month = $months[(date('m', strtotime($date)))];
$year = date('Y', strtotime($date));
?>

<main>
    <div class="container-fluid">
        <div class="row col-12 mx-auto row-cols-1">
            <div class="col">
                <h5 class="pt-3">Месяц и год</h5>
                <input type="month" id="start" name="start"
                       min="2022-10" value="2022-11">
            </div>
        </div>
        <h5 class="pt-4 pb-3">Табель на <?=$month . ' ' . $year . ' года'?></h5>
        <table class="table table-bordered table-hover" style="background: rgba( 255, 255, 255, 0.5 );
                                                                backdrop-filter: blur( 1px );
                                                                -webkit-backdrop-filter: blur( 1px );
                                                                border-radius: 5px;
                                                                border: 1px solid rgba( 255, 255, 255, 0.5 );">
            <thead>
            <tr>
                <th scope="col" style="width: 10%;" class="d-none d-sm-table-cell">Число
                </th>
                <th scope="col" style="width: 20%;"  class="d-none d-lg-table-cell">
                    День
                </th>
                <th scope="col" style="width: 15%;"  class="d-none d-lg-table-cell">
                    Отработано, ч
                </th>
                <th scope="col" style="width: 15%;" class="d-none d-md-table-cell">
                    Переработка, ч
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($dates as $date) {
                    $id = date('d', strtotime($date));
                    $day = $days[(date('w', strtotime($date)))];
                    $day_index = intval(date('w', strtotime($date)));
                    echo '<tr>';
                    if ($day_index !== 0 && $day_index !== 6) {
                        echo '<td style="background: rgba(7, 250, 7, 0.2);">' . $id . '</td>';
                        echo '<td style="background: rgba(7, 250, 7, 0.2);">' . $day . '</td>';
                        echo '<td style="background: rgba(7, 250, 7, 0.2);"><input name="hours" value="8" style="width: 30px; border: none; background-color: transparent;"></td>';
                        echo '<td style="background: rgba(7, 250, 7, 0.2);"><input name="over_time" value="0" style="width: 30px; border: none; background-color: transparent;"></td>';
                    } else {
                        echo '<td style="background: rgba(250, 7, 7, 0.2);">' . $id . '</td>';
                        echo '<td style="background: rgba(250, 7, 7, 0.2);">' . $day . '</td>';
                        echo '<td style="background: rgba(250, 7, 7, 0.2);"><input name="hours" value="0" style="width: 30px; border: none; background-color: transparent;"></td>';
                        echo '<td style="background: rgba(250, 7, 7, 0.2);"><input name="over_time" value="0" style="width: 30px; border: none; background-color: transparent;"></td>';
                    }
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
        <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-2 pb-3">
            <div class="col mt-3">
                <button class="btn btn-danger col-12" type="button">Сохранить</button>
            </div>
            <div class="col mt-3">
                <button onClick="history.back()" class="btn btn-success col-12" type="button">Назад</button>
            </div>
        </div>
    </div>
</main>
@endsection
