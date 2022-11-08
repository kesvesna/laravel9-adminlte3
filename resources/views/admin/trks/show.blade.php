@extends('admin.layouts.admin')

@section('title')
    @parent Торговый комплекс
@endsection

@section('content')
    <br>
    <h2>Торговый комплекс {{ $trk->id }}</h2>
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
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    <br>
    <hr>
    <h4>Блоки/Зоны {{ $trk->name }}</h4>
    <table class="table pb-5" id="buildings-table">
        <tbody>
        @forelse($trk->buildings as $building)
        <tr id="{{ $building->id }}">
            <td>
                <select disabled name="building_id" id="building_id" class="form-control">
                        <option
                            value="{{ $building->id }}">{{ $building->name }}
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
            Нет блоков/зон
        </tr>
        @endforelse
        <tr id="{{ $trk->buildings->last()->id + 1 }}">
            <td>
                <select id="all_buildings" class="form-control">
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
                <button type="button" class="add" style="border: none; background-color: transparent;">
                    <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add image" height="30" weight="30">
                </button>
            </td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-danger mb-3">Сохранить блоки/зоны</button>
@endsection

