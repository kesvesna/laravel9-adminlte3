@extends('admin.layouts.admin')

@section('title')
    @parent Блоки/Зоны
@endsection

@section('content')
    <br>
    <h1>Блоки/Зоны</h1>
    <a href="{{ route('admin.buildings.create') }}" class=" btn btn-sm  btn-lg  btn-outline-warning mb-3"><b>Добавить блок/зону</b></a>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">НАЗВАНИЕ</th>
                <th scope="col">ОПЕРАЦИИ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($buildings as $building)
                <tr>
                    <th scope="row">{{ $building->id }}</th>
                    <td>{{ $building->name }}</td>
                    <td>
                        <form action="{{ route('admin.buildings.destroy', $building->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.buildings.show', $building->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                  style="color: green;  opacity: .7;"
                                                                                  title="Посмотреть"></i></a>
                            <a href="{{ route('admin.buildings.edit', $building->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет блоков/зон
            @endforelse
            </tbody>
        </table>
        {{ $buildings->links() }}
    </div>
@endsection
