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
                <a href="{{ route('front.applications.index') }}" class="btn btn-success btn-sm">Сброс фильтров</a>
            </div>
            </div>
        <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3 pt-2 d-md-none">
            <div class="col">
                <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                <select id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                    @forelse($trks as $trk)
                        <option value="{{ $trk->id }}">{{ $trk->name }}</option>
                    @empty
                        Нет трк
                    @endforelse
                </select>
            </div>
            <div class="col pt-2">
                <label for="system_id" class="form-label" style="color: white;">Подразделение</label>
                <select id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                    <option value="">Все</option>
                    @forelse($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @empty
                        Нет подразделений
                    @endforelse
                </select>
            </div>
            <div class="col pt-2">
                <label for="status_id" class="form-label" style="color: white;">Статус заявки</label>
                <select id="status_id" name="status_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );" onchange="this.form.submit()">
                    <option value="">Все</option>
                    @forelse($application_statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @empty
                        Нет статусов
                    @endforelse
                </select>
            </div>
        </div>
        <table class="table table-bordered table-hover mt-4" style="background: rgba( 255, 255, 255, 0.1 );
    backdrop-filter: blur( 1px );
    -webkit-backdrop-filter: blur( 1px );
    border-radius: 5px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );">
            <form action="{{ route('front.applications.index') }}" method="get">
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
                    <select name="trk_id" class="form-select" aria-label="trk" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($trks as $trk)
                            <option @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif value="{{ $trk->id }}">{{ $trk->name }}</option>
                        @empty
                            Нет трк
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select name="application_status_id" class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                        @forelse($application_statuses as $status)
                            <option  @if(isset($old_filters['application_status_id'])){{ $old_filters['application_status_id'] == $status->id ? ' selected' : '' }} @endif value="{{ $status->id }}">{{ $status->name }}</option>
                        @empty
                            Нет статусов
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select name="service_id" class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );"  onchange="this.form.submit()">
                        <option value="">Все</option>
                    @forelse($services as $service)
                            <option  @if(isset($old_filters['service_id'])){{ $old_filters['service_id'] == $service->id ? ' selected' : '' }} @endif value="{{ $service->id }}">{{ $service->name }}</option>
                        @empty
                            Нет подразделений
                        @endforelse
                    </select>
                </td>
                <td colspan="4">
                    <input   value="@if(isset($old_filters['comment'])) {{ $old_filters['comment'] }} @endif" autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="comment" type="search" class="form-control" placeholder="Поиск" aria-label="comment" aria-describedby="comment">
                </td>
            </tr>
            @forelse($applications as $application)
                <tr style="color: white;"  onclick="window.location='{{ route('front.applications.show', $application->id) }}';">
                    <td class="d-none d-sm-table-cell">{{ $application->created_at }}</td>
                    <td class="d-none d-lg-table-cell">{{ $application->trk->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $application->application_status->name }}</td>
                    <td class="d-none d-md-table-cell">{{ $application->service->name }}</td>
                    <td>{{ $application->comment }}</td>
                </tr>
                @empty
                    Нет заявок
            @endforelse
            </tbody>
            </form>
        </table>
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
