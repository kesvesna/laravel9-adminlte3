@extends('admin.layouts.admin')

@section('title')
    @parent Помещения
@endsection

@section('content')
    <br>
    <h1>Помещения</h1>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-lg btn-outline-warning mb-3"><b>Добавить помещение</b></a>
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
            @forelse($rooms as $room)
                <tr>
                    <th scope="row">{{ $room->id }}</th>
                    <td>{{ $room->name }}</td>
                    <td>
                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.rooms.show', $room->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                  style="color: green;  opacity: .7;"
                                                                                  title="Посмотреть"></i></a>
                            <a href="{{ route('admin.rooms.edit', $room->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет помещений
            @endforelse
            </tbody>
        </table>
        {{ $rooms->links() }}
    </div>
@endsection
