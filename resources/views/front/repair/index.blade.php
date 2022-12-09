@extends('front.layouts.main')

@section('title')
    @parent | Ремонты
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
        <h5 style="color: white;" class="pt-3 pb-2">Ремонты</h5>
        <form action="{{ route('front.repair.index') }}" method="get">
            <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 pt-2 d-md-none">
                <div class="col">
                    <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                    <select name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($trks as $trk)
                            <option  @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif value="{{ $trk->id }}">{{ $trk->name }}</option>
                        @empty
                            Нет трк
                        @endforelse
                    </select>
                </div>
                <div class="col pt-2">
                    <label for="service_id" class="form-label" style="color: white;">Подразделение</label>
                    <select name="service_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($services as $service)
                            <option  @if(isset($old_filters['service_id'])){{ $old_filters['service_id'] == $service->id ? ' selected' : '' }} @endif value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                            Нет подразделений
                        @endforelse
                    </select>
                </div>
                <div class="col pt-2">
                    <label for="application_status_id" class="form-label" style="color: white;">Статус заявки</label>
                    <select name="application_status_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($repair_statuses as $status)
                            <option  @if(isset($old_filters['repair_status_id'])){{ $old_filters['repair_status_id'] == $status->id ? ' selected' : '' }} @endif value="{{ $status->id }}">{{ $status->name }}</option>
                        @empty
                            Нет статусов
                        @endforelse
                    </select>
                </div>
            </div>
        </form>
        <form action="{{ route('front.repair.index') }}" method="get">
        <table class="table table-bordered table-hover" style="background: rgba( 255, 255, 255, 0.1 );
    backdrop-filter: blur( 1px );
    -webkit-backdrop-filter: blur( 1px );
    border-radius: 5px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );">
            <thead>
            <tr>
                <th scope="col" style="width: 10%;" class="d-none d-sm-table-cell">Дата
{{--                    <button class="btn">--}}
{{--                        <img class="" src="{{ asset('icons/arrow-down-up.svg') }}" alt="Arrow-down-up" width="20" height="20">--}}
{{--                    </button>--}}
                </th>
                <th scope="col" style="width: 20%;"  class="d-none d-lg-table-cell">
                    ТРК
                </th>
                <th scope="col" style="width: 15%;"  class="d-none d-lg-table-cell">
                    Статус
                </th>
                <th scope="col" style="width: 15%;" class="d-none d-md-table-cell">
                    Поздразделение
                </th>
                <th scope="col">Задача</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="d-none d-sm-table-cell">
                    <input value="@if(isset($old_filters['created_at'])){{ $old_filters['created_at'] }}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="created_at" type="date" class="form-control" placeholder="Поиск" aria-label="created_at" aria-describedby="created_at" onchange="this.form.submit()">
                </td>
                <td class="d-none d-lg-table-cell">
                    <select name="trk_id" class="form-select" aria-label="trk_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($trks as $trk)
                            <option @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif value="{{ $trk->id }}">{{ $trk->name }}</option>
                        @empty
                            Нет трк
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select name="repair_status_id" class="form-select" aria-label="repair_status_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($repair_statuses as $status)
                            <option  @if(isset($old_filters['repair_status_id'])){{ $old_filters['repair_status_id'] == $status->id ? ' selected' : '' }} @endif value="{{ $status->id }}">{{ $status->name }}</option>
                        @empty
                            Нет статусов
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select name="service_id" class="form-select" aria-label="service_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($services as $service)
                            <option  @if(isset($old_filters['service_id'])){{ $old_filters['service_id'] == $service->id ? ' selected' : '' }} @endif value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                            Нет подразделений
                        @endforelse
                    </select>
                </td>
                <td colspan="4">
                    <input   value="{{ request()->input('comment') }}" autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="comment" type="search" class="form-control" placeholder="Поиск" aria-label="comment" aria-describedby="comment">
                </td>
            </tr>
            </tr>
            @forelse($repairs as $repair)
                <tr style="color: white;"  onclick="window.location='{{ route('front.repair.show', $repair->id) }}';">
                    <td class="d-none d-sm-table-cell">{{ $repair->currentHistory->plan_date }}</td>
                    <td class="d-none d-lg-table-cell">{{ $repair->trk->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $repair->currentHistory->repair_status->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $repair->currentHistory->service->name }}</td>
                    <td>{{ $repair->comment }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="color: white;">
                        Нет ремонтов
                    </td>
                </tr>
            @endforelse
            <tr>
                <th colspan="5">
                    <a href="{{ route('front.repair.index') }}" class="btn col-12 btn-sm" style="background: rgba( 7, 250, 7, 0.1 );
                                                                    backdrop-filter: blur( 1px );
                                                                    -webkit-backdrop-filter: blur( 1px );
                                                                    border-radius: 5px;
                                                                    border: 1px solid rgba( 255, 255, 255, 0.18 );"><b>Сброс фильтров ремонта</b></a>
                </th>
            </tr>
            </tbody>
        </table>
        </form>
        {{ $repairs->withQueryString()->links() }}
        <div class="row pb-2 d-flex flex-row-reverse pe-5">
            <a href="{{ route('front.repair.create') }}" style="width: 0">
                <img src="{{ asset('icons/plus.svg') }}" alt="Add picture" width="50" height="50">
            </a>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
