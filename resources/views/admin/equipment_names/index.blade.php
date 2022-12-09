@extends('admin.layouts.admin')

@section('title')
    @parent Наименования
@endsection

@section('content')
    <br>
    <h1>Наименования</h1>
    <a href="{{ route('admin.equipment_names.create') }}" class="btn btn-lg btn-outline-warning mb-3"><b>Добавить</b></a>
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
            @forelse($equipment_names as $name)
                <tr>
                    <th scope="row">{{ $name->id }}</th>
                    <td>{{ $name->name }}</td>
                    <td>
                        <form action="{{ route('admin.equipment_names.destroy', $name->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.equipment_names.show', $name->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                  style="color: green;  opacity: .7;"
                                                                                  title="Посмотреть"></i></a>
                            <a href="{{ route('admin.equipment_names.edit', $name->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет наименований
            @endforelse
            </tbody>
        </table>
        {{ $equipment_names->links() }}
    </div>
@endsection
