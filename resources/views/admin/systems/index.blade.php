@extends('admin.layouts.admin')

@section('title')
    @parent Тип оборудования
@endsection

@section('content')
    <br>
    <h1>Тип оборудования</h1>
    <a href="{{ route('admin.systems.create') }}" class=" btn btn-sm  btn-lg  btn-outline-warning mb-3"><b>Добавить</b></a>
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
            @forelse($systems as $system)
                <tr>
                    <th scope="row">{{ $system->id }}</th>
                    <td>{{ $system->name }}</td>
                    <td>
                        <form action="{{ route('admin.systems.destroy', $system->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.systems.show', $system->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                  style="color: green;  opacity: .7;"
                                                                                  title="Посмотреть"></i></a>
                            <a href="{{ route('admin.systems.edit', $system->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет систем
            @endforelse
            </tbody>
        </table>
        {{ $systems->links() }}
    </div>
@endsection
