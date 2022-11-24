@extends('front.layouts.main')

@section('title')
    @parent | Оборудование
@endsection

@section('content')
<main>
    <div class="container-fluid">
        <div class="container" style="padding-bottom: 15vh;">
                    <div>
                        <div class="row col-12 mx-auto row-cols-1">
                            <div class="col">
                            <h5 style="color: white;" class="mt-4">Оборудование № {{ $equipment->id }}, {{ $equipment->name->name }}</h5>
                                </div>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3">
                        <div class="col mt-2">
                            <select disabled id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                                <option value="">{{ $equipment->trk->name }}</option>
                            </select>                        </div>
                        <div class="col mt-2">
                            <select disabled id="system_type_id" name="system_type_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                                <option value="">{{ $equipment->system->name }}</option>
                            </select>
                        </div>
                    </div>
            <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3">
                <div class="col mt-2">
                    <select disabled id="building_id" name="building_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                        <option value="">{{ $equipment->building->name }}</option>
                    </select>
                </div>
                <div class="col mt-2">
                    <select disabled id="floor_id" name="floor_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                        <option value="">{{ $equipment->floor->name }}</option>
                    </select>
                </div>
            </div>
            <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3">
                <div class="col mt-2">
                    <select disabled id="room_id" name="room_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                        <option value="">{{ $equipment->room->name }}</option>
                    </select>
                </div>
                <div class="col mt-2">
                    <select disabled id="equipment_name_id" name="equipment_name_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                        <option value="">{{ $equipment->name->name }}</option>
                    </select>
                </div>
            </div>
            <hr>
                    <p style="color: white;">Photos</p>
                    <p style="color: white;">Applications</p>
                    <p style="color: white;">Repairs</p>
                    <p style="color: white;">Acts</p>
                    <p style="color: white;">Spare parts</p>
                    <p style="color: white;">Consumers</p>
                    <p style="color: white;">Comments</p>
                    <p style="color: white;">Something else</p>

            <hr>
                    @if(isset($equipment->medias))
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-{{ count($equipment->medias) }} my-2">
                        @forelse($equipment->medias as $media)
                            <div class="col my-2">
                                <a href="{{ Storage::disk('public')->url($media->name) }}" target="_blank">
                                    <img class="img-thumbnail" src="{{ Storage::disk('public')->url($media->name) }}" alt="Equipment file"></a>
                            </div>
                           @empty
                        @endforelse
                    </div>
                    @endif
                    @if(isset($equipment->histories) && count($equipment->histories) > 0)
                        <div class="row col-12 mx-auto row-cols-1 my-2">
                        <h6 style="color: white;">История оборудования</h6>
                        @forelse($equipment->histories as $history)
                            <div class="col">
                                <p style="color: white;">{{ $history->created_at }}, {{ $history->equipment_status->name }}, создал {{ $history->created_by_user->name }}, {{$history->comment }}</p>
                            </div>
                            @empty
                            Нет истории
                        @endforelse
                        </div>
                    @endif
                    <div class="row col-12 mx-auto row-cols-1">
                        <div class="col">
                            <button onClick="history.back()" class="btn btn-success col-12" type="button"><b>Назад</b></button>
                        </div>
                    </div>
            </div>
        </div>
    @include('front.components.navbar')
</main>
@endsection
