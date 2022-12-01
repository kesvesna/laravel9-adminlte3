@extends('admin.layouts.admin')

@section('title')
    @parent Тип работ
@endsection

@section('content')
    <br>
    <h1>Тип работ</h1>
    <a href="{{ route('admin.work_types.create') }}" class="btn btn-lg btn-outline-warning mb-3"><b>Добавить</b></a>
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
            @forelse($work_types as $work_type)
                <tr>
                    <th scope="row">{{ $work_type->id }}</th>
                    <td>{{ $work_type->name }}</td>
                    <td>
                        <form action="{{ route('admin.work_types.destroy', $work_type->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.work_types.show', $work_type->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                  style="color: green;  opacity: .7;"
                                                                                  title="Посмотреть"></i></a>
                            <a href="{{ route('admin.work_types.edit', $work_type->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет типов работ
            @endforelse
            </tbody>
        </table>
        {{ $work_types->links() }}
    </div>
@endsection
