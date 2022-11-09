@extends('admin.layouts.admin')

@section('title')
    @parent Торговый комплекс
@endsection

@section('content')
    <br>
    <h2>ТРК {{ $trk->name }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $trk->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $trk->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Название</th>
            <td>{{ $trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Город</th>
            <td>{{ $trk->town->name }}</td>
        </tr>
        <tr>
            <th scope="row">Slug</th>
            <td>{{ $trk->slug }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.trks.destroy', $trk->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.trks.index') }}" class="btn btn-success mr-3 mb-3">Назад</a>
        <a href="{{ route('admin.trks.edit', $trk->id) }}" class="btn btn-warning mr-3 mb-3">Редактировать</a>
        <button type="submit" class="btn btn-danger mb-3">Удалить</button>
    </form>
    <br>
    <h4>Блоки/Зоны {{ $trk->name }}</h4>
    <form action="{{ route('admin.buildings-trks.update', $trk->id) }}" method="post">
        @csrf
        <table class="table pb-5" id="buildings-table">
            <tbody>
            @forelse($trk->buildings as $building)
                <tr id="{{ $building->id }}">
                    <td>
                        <select name="building[]" class="form-control">
                            <option
                                value="{{ $building->id }}">{{ $building->name }}
                            </option>
                        </select>
                    </td>
                    <td>
                        <button class="delete-building-trks-buildings" style="border: none; background-color: transparent;">
                            <img src="{{ asset('icons/delete.svg') }}" class="rounded" alt="Delete image" height="30" weight="30">
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <hr>
                    Нет блоков/зон
                </tr>
            @endforelse
            <tr id="@if(!empty($trk->building)) {{ $trk->building->last()->id + 1 }} @else {{ 1 }} @endif">
                <td>
                    <select class="form-control" name="building[]">
                        <option value="0" selected>Выберите ...</option>
                        @forelse($buildings as $building)
                            <option
                                value="{{ $building->id }}">{{ $building->name }}
                            </option>
                        @empty
                            <option value="0">Нет блоков/зон в списке</option>
                        @endforelse
                    </select>
                </td>
                <td>
                    <button type="button" class="add-building-trks-buildings" style="border: none; background-color: transparent;">
                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add image" height="30" weight="30">
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-danger mb-3">Сохранить блоки/зоны</button>
    </form>
    <br>
    <h4>Этажи/Уровни {{ $trk->name }}</h4>
    <form action="{{ route('admin.buildings-trks.update', $trk->id) }}" method="post">
        @csrf
        <table class="table pb-5" id="buildings-floors-table">
            <thead>
            <tr>
                <td>
                    Блок/Зона
                </td>
                <td>
                    Этаж/Уровень
                </td>
            </tr>
            </thead>
            <tbody>
            @forelse($trk->floors as $floor)
                {{ dd($floor->trks) }}
                <tr id="{{ $floor->id }}">
                    <td>
                        <select name="trk[buildings_floors][building_id][]" class="form-control">
                            @forelse($floor->buildings as $building)
                            <option
                                value="{{ $building->id }}">{{ $building->name }}
                            </option>
                                @empty
                            <p>нет зданий</p>
                            @endforelse
                        </select>
                    </td>
                    <td>
                        <select name="trk[buildings_floors][floor_id][]" class="form-control">
                            <option
                                value="">Этаж 1
                            </option>
                        </select>
                    </td>
                    <td>
                        <button class="delete" style="border: none; background-color: transparent;">
                            <img src="{{ asset('icons/delete.svg') }}" class="rounded" alt="Delete image" height="30" weight="30">
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <hr>
                    Нет этажей/уровней
                </tr>
            @endforelse
            <tr id="@if(!empty($trk->building)){{$trk->building->last()->id + 1}}@else{{1}}@endif">
                <td>
                    <select class="form-control" name="trk[buildings_floors][building_id][]">
                        @forelse($buildings as $building)
                            <option
                                value="{{ $building->id }}">{{ $building->name }}
                            </option>
                        @empty
                            <option value="0">Нет блоков/зон в списке</option>
                        @endforelse
                    </select>
                </td>
                <td>
                    <select name="trk[buildings_floors][floor_id][]" class="form-control">
                        @forelse($buildings as $building)
                            <option
                                value="{{ $building->id }}">{{ $building->name }}
                            </option>
                        @empty
                            <option value="0">Нет блоков/зон в списке</option>
                        @endforelse
                    </select>
                </td>
                <td>
                    <button type="button" class="add" style="border: none; background-color: transparent;">
                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add image" height="30" weight="30">
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-danger mb-3">Сохранить этажи/уровни</button>
    </form>
@endsection

