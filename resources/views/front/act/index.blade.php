@extends('front.layouts.main')

@section('title')
    @parent | Акты
@endsection

@section('content')
<main>
    <div class="container-fluid" style="padding-bottom: 15vh;">
        <h5 style="color: white;" class="pt-3 pb-2">Акты</h5>
        <table class="table table-bordered table-hover" style="background: rgba( 255, 255, 255, 0.1 );
                                                                backdrop-filter: blur( 1px );
                                                                -webkit-backdrop-filter: blur( 1px );
                                                                border-radius: 5px;
                                                                border: 1px solid rgba( 255, 255, 255, 0.18 );">
            <thead>
            <tr>
                <th scope="col" style="width: 15%;" class="d-none d-sm-table-cell">Дата
                </th>
                <th scope="col" style="width: 20%;"  class="d-none d-lg-table-cell">
                    ТРК
                </th>
                <th scope="col" style="width: 20%;" class="d-none d-md-table-cell">
                    Тип оборудования
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
                        <option selected value="">Все</option>
                        @forelse($trks as $trk)
                            <option value="{{$trk->id}}">{{$trk->name}}</option>
                        @empty
                            Нет комплексов в списке
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-md-table-cell">
                    <select class="form-select" aria-label="type" style="background: rgba( 255, 255, 255, 0.5 );" >
                        <option selected value="">Все</option>
                        @forelse($systems as $system)
                            <option value="{{$system->id}}">{{$system->name}}</option>
                        @empty
                            Нет систем в списке
                        @endforelse
                    </select>
                </td>
                <td class="d-none d-lg-table-cell">
                    <input  style="background: rgba( 255, 255, 255, 0.5 );" name="room" type="search" class="form-control" placeholder="Поиск" aria-label="room" aria-describedby="room">
                </td>
                <td colspan="4">
                    <input  autofocus style="background: rgba( 255, 255, 255, 0.5 );" name="equipment" type="search" class="form-control" placeholder="Поиск" aria-label="equipment" aria-describedby="equipment">
                </td>
            </tr>
            @forelse($acts as $act)
                <tr style="color: white;"  onclick="window.location='{{ route('front.acts.show', $act->id) }}';" >
                    <td class="d-none d-sm-table-cell">{{$act->date}}</td>
                    <td class="d-none d-lg-table-cell">{{$act->trk->name}}</td>
                    <td class="d-none d-md-table-cell">{{$act->system->name}}</td>
                    <td class="d-none d-lg-table-cell">{{$act->room->name}}</td>
                    <td>{{$act->equipment->name->name}}</td>
                </tr>
            @empty
                <tr style="color: white;">
                    <td>Нет актов</td>
                </tr>
            @endforelse
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
