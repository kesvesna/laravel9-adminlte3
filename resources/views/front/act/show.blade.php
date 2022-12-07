@extends('front.layouts.main')

@section('title')
    @parent | Акт
@endsection

@section('content')
<main>
    <div class="container-fluid">
        <div class="container pt-3" style="padding-bottom: 15vh;">
            <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );"
                  class="pt-2 pb-3">
                <div class="d-flex justify-content-center">
                    <div class="col-10">
                        <h4 style="color: white;">Акт № {{$act->id}}</h4>
                        @if(isset($act->application))
                            <a href="{{ route('front.applications.show', $act->application->id) }}" style="text-decoration-color: white;"><h5 style="color: white;">По заявке № {{$act->application->id}}</h5></a>
                        @endif
                    </div>
                </div>
                <div class="mb-2 mt-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label class="mb-2" for="date" style="color: white;">Дата и время:</label>
                        <br>
                        <input disabled value="{{$act->date}}" type="datetime-local" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="trk_id" class="form-label" style="color: white;">Торговый комплекс</label>
                        <input disabled value="{{$act->trk->name}}" type="text" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="system_id" class="form-label" style="color: white;">Тип оборудования</label>
                        <input disabled value="{{$act->system->name}}" type="text" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="building_id" class="form-label" style="color: white;">Блок/Зона</label>
                        <input disabled value="{{$act->building->name}}" type="text" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="floor_id" class="form-label" style="color: white;">Этаж</label>
                        <input disabled value="{{$act->equipment->floor->name}}" type="text" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                </div>
                <div class="mb-2 d-lg-flex justify-content-around">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="room_id" class="form-label" style="color: white;">Помещение</label>
                        <input disabled value="{{$act->room->name}}" type="text" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                    </div>
                    <div class="col-11 col-sm-10 col-md-10 col-lg-4 mx-auto">
                        <label for="equipment_id" class="form-label" style="color: white;">Оборудование<wbr> (по&nbsp;проекту)</label>
                        <input disabled value="{{$act->equipment->name->name}}" type="text" class="form-control" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label class="form-label" style="color: white;">Выполненные работы</label>
                        @forelse($act->this_works as $work)
                            @foreach($work->work_type as $type)
                                    <input disabled value="{{$type->name}}" type="text" class="form-control mb-1 mt-2" style="background: rgba( 255, 255, 255, 0.5 );">
                            @endforeach

                                @foreach($work->spare_parts as $spare_parts)
                                    @if(isset($spare_parts->one_spare_part))
                                    <div class="ps-4 pb-1">
                                        <input  disabled style="background: rgba( 255, 255, 255, 0.5 );" class="form-control form-control-sm" type="text"
                                            value="{{$spare_parts->one_spare_part->name}}@if($spare_parts->count){{', ' . $spare_parts->count}}@endif @if($spare_parts->model){{', ' . $spare_parts->model}}@endif @if($spare_parts->comment){{', ' . $spare_parts->comment }}@endif"
                                        >
                                    </div>
                                    @endif
                                @endforeach

                        @empty
                            Нет работ
                        @endforelse
                    </div>
                </div>
                @if($act->works)
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Описание работ</label>
                        <textarea  disabled class="form-control" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{$act->works}}</textarea>
                    </div>
                </div>
                @endif
                @if($act->remarks)
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Замечания</label>
                        <textarea  disabled class="form-control" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{$act->remarks}}</textarea>
                    </div>
                </div>
                @endif
                @if($act->recommendations)
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Рекомендации</label>
                        <textarea  disabled class="form-control" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{$act->recommendations}}</textarea>
                    </div>
                </div>
                @endif
                @if($act->spare_parts)
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="comment" class="form-label" style="color: white;">Потраченные тмц</label>
                        <textarea  disabled class="form-control" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{$act->spare_parts}}</textarea>
                    </div>
                </div>
                @endif
                @if(isset($act->medias))
                    <div class="d-flex row col-11 col-sm-10 row-cols-1 mx-auto row-cols-sm-2 row-cols-md3 row-cols-lg-4">
                        @forelse($act->medias as $media)
                                <div style="max-height: 50vh;" class="mb-2">
                                <a href="{{ Storage::disk('public')->url($media->name) }}" target="_blank">
                                    <img style="height: 100%; width: 100%;" class="img-thumbnail" src="{{ Storage::disk('public')->url($media->name) }}" alt="Act file"></a>
                                </div>
                        @empty
                        @endforelse
                    </div>
                @endif
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label class="form-label" style="color: white;">Исполнители</label>
                        @forelse($act->users as $user)
                            <input disabled value="{{$user->name}}" type="text" class="form-control mb-2" style="background: rgba( 255, 255, 255, 0.5 );">
                        @empty
                            Нет исполнителей
                        @endforelse
                    </div>
                </div>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-between col-11 mx-auto col-sm-10">
                    <button onClick="history.back()" class="btn btn-success col-sm-5" type="button">Назад</button>
                </div>
            </form>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection
