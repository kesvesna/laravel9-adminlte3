@extends('front.layouts.main')

@section('title')
    @parent | Заявки
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
{{--            <h5 style="color: white;">Заявки</h5>--}}
        <form action="{{ route('front.applications.index') }}" method="get">
            <h4 style="color: white;" class="pt-4 pb-2">Заявки</h4>
        <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 pt-2 d-md-none">
            <div class="col">
                <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                <select name="trk_id" class="form-select form-select-sm form-select form-select-sm-sm" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
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
                <select name="service_id" class="form-select form-select-sm form-select form-select-sm-sm" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                    <option value="">Все</option>
                    @forelse($services as $service)
                        <option  @if(isset($old_filters['service_id'])){{ $old_filters['service_id'] == $service->id ? ' selected' : '' }} @endif value="{{ $service->id }}">{{ $service->name }}</option>
                    @empty
                        Нет подразделений
                    @endforelse
                </select>
            </div>
            <div class="col pt-2 pb-4">
                <label for="application_status_id" class="form-label" style="color: white;">Статус заявки</label>
                <select name="application_status_id" class="form-select form-select-sm form-select form-select-sm-sm" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                    <option value="">Все</option>
                    @forelse($application_statuses as $status)
                        <option  @if(isset($old_filters['application_status_id'])){{ $old_filters['application_status_id'] == $status->id ? ' selected' : '' }} @endif value="{{ $status->id }}">{{ $status->name }}</option>
                    @empty
                        Нет статусов
                    @endforelse
                </select>
            </div>
        </div>
        </form>
        <form action="{{ route('front.applications.index') }}" method="get">
        <table class="table table-bordered table-hover mt-2" style="background: rgba( 255, 255, 255, 0.1 );
                                                                    backdrop-filter: blur( 1px );
                                                                    -webkit-backdrop-filter: blur( 1px );
                                                                    border-radius: 5px;
                                                                    border: 1px solid rgba( 255, 255, 255, 0.18 );">
            <thead>
            <tr>
                <th scope="col" style="width: 10%;"  class="d-none d-sm-table-cell">
                    ID
                </th>
                <th scope="col" style="width: 15%;" class="d-none d-sm-table-cell">Дата
{{--                    <button class=" btn btn-sm">--}}
{{--                        <img class="" src="{{ asset('icons/arrow-down-up.svg') }}" alt="Arrow-down-up" width="20" height="20">--}}
{{--                    </button>--}}
                </th>
                <th scope="col" style="width: 21%;"  class="d-none d-lg-table-cell">
                    ТРК
                </th>
                <th scope="col" style="width: 16%;" class="d-none d-md-table-cell">
                    Статус
                </th>
                <th scope="col" style="width: 15%;"  class="d-none d-md-table-cell">Подразделение</th>
                <th scope="col" colspan="4">Проблема/Задача</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td  class="d-none d-sm-table-cell">
                    <input   value="{{ request()->input('id') }}" style="background: rgba( 255, 255, 255, 0.5 );" name="id" type="search" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Поиск" aria-label="id" aria-describedby="id">
                </td>
                <td class="d-none d-sm-table-cell">
                    <input value="@if(isset($old_filters['created_at'])){{ $old_filters['created_at'] }}@endif" style="background: rgba( 255, 255, 255, 0.5 );" name="created_at" type="date" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Поиск" aria-label="created_at" aria-describedby="created_at" onchange="this.form.submit()">
                </td>
                <td class="d-none d-lg-table-cell">
                    <select name="trk_id" class="form-select form-select-sm" aria-label="trk_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($trks as $trk)
                            <option @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif value="{{ $trk->id }}">{{ $trk->name }}</option>
                        @empty
                            Нет трк
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select name="application_status_id" class="form-select form-select-sm" aria-label="application_status_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($application_statuses as $status)
                            <option  @if(isset($old_filters['application_status_id'])){{ $old_filters['application_status_id'] == $status->id ? ' selected' : '' }} @endif value="{{ $status->id }}">{{ $status->name }}</option>
                        @empty
                            Нет статусов
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select name="service_id" class="form-select form-select-sm" aria-label="service_id" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                    @forelse($services as $service)
                            <option  @if(isset($old_filters['service_id'])){{ $old_filters['service_id'] == $service->id ? ' selected' : '' }} @endif value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                            Нет подразделений
                        @endforelse
                    </select>
                </td>
                <td colspan="4">
                    <input value="{{ request()->input('comment') }}" autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="comment" type="search" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Поиск" aria-label="comment" aria-describedby="comment">
                </td>
            </tr>
            @forelse($applications as $application)
                <tr style="color: white; {{$application->currentHistory->application_status->background_color}}"  onclick="window.location='{{ route('front.applications.show', $application->id) }}';">
                    <td  class="d-none d-sm-table-cell">{{ $application->id }}</td>
                    <td class="d-none d-sm-table-cell">{{ $application->created_at }}</td>
                    <td class="d-none d-lg-table-cell">{{ $application->trk->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $application->currentHistory->application_status->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $application->currentHistory->service->name }}</td>
                    <td>{{ Str::limit($application->comment, 25, ' ...')  }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6"><b style="color: white;">Нет заявок</b></td>
                </tr>
            @endforelse
            <tr>
                <th colspan="6">
                    <a href="{{ route('front.applications.index') }}" class=" btn btn-sm col-12  " style="background: rgba( 7, 250, 7, 0.1 );
                                                                    backdrop-filter: blur( 1px );
                                                                    -webkit-backdrop-filter: blur( 1px );
                                                                    border-radius: 5px;
                                                                    border: 1px solid rgba( 255, 255, 255, 0.18 );"><b>Сброс фильтров заявок</b></a>
                </th>
            </tr>
            </tbody>
        </table>
        </form>
        {{ $applications->withQueryString()->links() }}
            <div class="row pb-2 d-flex flex-row-reverse pe-5">
                <a href="{{ route('front.applications.create') }}" style="width: 0">
                    <img src="{{ asset('icons/plus.svg') }}" alt="Add picture" width="50" height="50">
                </a>
            </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
