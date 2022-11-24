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
                            <h5 style="color: white;" class="mt-4">Оборудование № {{ $equipment->id }}</h5>
                                </div>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 row-cols-md-2 row-cols-xxl-3">
                        <div class="col mt-2">
                            <input disabled type="datetime-local" value="{{ $equipment->created_at }}" id="created_at" name="created_at" class="form-control" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold">
                        </div>
                        <div class="col mt-2">
                            <select disabled id="trk_id" name="trk_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                                <option value="">{{ $equipment->trk->name }}</option>
                            </select>
                        </div>
                        <div class="col mt-2">
                            <select disabled id="system_id" name="system_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 ); font-weight: bold;">
                                <option value="">{{ $equipment->currentHistory->service->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12 mx-auto row-cols-1 mt-2">
                        <div class="col">
                            <textarea disabled class="form-control" id="comment" name="comment" rows="2" style="background: rgba( 255, 255, 255, 0.5 );">{{ $application->comment }}</textarea>
                        </div>
                    </div>
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
                                <p style="color: white;">{{ $history->created_at }}, {{ $history->equipment_status->name }},  {{ $history->service->name }}, от {{ $history->created_by_user->name }}, {{$history->comment }}</p>
                            </div>
                            @empty
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
