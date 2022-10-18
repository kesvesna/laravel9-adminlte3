@extends('admin.layouts.admin')

@section('title')
    @parent Этажи/Уровни
@endsection

@section('content')
    <br>
    <h1>Этажи/Уровни</h1>
    <a href="{{ route('admin.floors.create') }}" class="btn btn-lg btn-outline-warning mb-3"><b>Добавить блок/зону</b></a>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ТРК</th>
                <th scope="col">НАЗВАНИЕ</th>
                <th scope="col">ОПЕРАЦИИ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($floors as $floor)
                <tr>
                    <th scope="row">{{ $floor->id }}</th>
                    <td>{{ $floor->name }}</td>
                    <td>{{ $floor->trk->name }}</td>
                    <td>
                        <form action="{{ route('admin.floors.destroy', $floor->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.floors.show', $floor->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                  style="color: green;  opacity: .7;"
                                                                                  title="Посмотреть"></i></a>
                            <a href="{{ route('admin.floors.edit', $floor->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет этажей/уровней
            @endforelse
            </tbody>
        </table>
        {{ $floors->links() }}
    </div>
@endsection
