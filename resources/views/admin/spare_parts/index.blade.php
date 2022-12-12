@extends('admin.layouts.admin')

@section('title')
    @parent Деталь
@endsection

@section('content')
    <br>
    <h1>Деталь</h1>
    <a href="{{ route('admin.spare_parts.create') }}" class=" btn btn-sm  btn-lg  btn-outline-warning mb-3"><b>Добавить деталь</b></a>
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
            @forelse($spare_parts as $spare_part)
                <tr>
                    <th scope="row">{{ $spare_part->id }}</th>
                    <td>{{ $spare_part->name }}</td>
                    <td>
                        <form action="{{ route('admin.spare_parts.destroy', $spare_part->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.spare_parts.show', $spare_part->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                  style="color: green;  opacity: .7;"
                                                                                  title="Посмотреть"></i></a>
                            <a href="{{ route('admin.spare_parts.edit', $spare_part->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет деталей
            @endforelse
            </tbody>
        </table>
        {{ $spare_parts->links() }}
    </div>
@endsection
