@extends('admin.layouts.admin')

@section('title')
    @parent Города
@endsection

@section('content')
    <br>
    <h1>Города</h1>
    <a href="{{ route('admin.towns.create') }}" class=" btn btn-sm  btn-lg  btn-outline-warning mb-3"><b>Добавить город</b></a>
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
            @forelse($towns as $town)
                <tr>
                    <th scope="row">{{ $town->id }}</th>
                    <td>{{ $town->name }}</td>
                    <td>
                        <form action="{{ route('admin.towns.destroy', $town->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.towns.show', $town->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                    style="color: green;  opacity: .7;"
                                                                                    title="Посмотреть"></i></a>
                            <a href="{{ route('admin.towns.edit', $town->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет городов
            @endforelse
            </tbody>
        </table>
        {{ $towns->links() }}
    </div>
@endsection
