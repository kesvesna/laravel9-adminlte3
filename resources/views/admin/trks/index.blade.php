@extends('admin.layouts.admin')

@section('title')
    @parent Торговые комплексы
@endsection

@section('content')
    <br>
    <h1>Торговые комплексы</h1>
    <a href="{{ route('admin.trks.create') }}" class="btn btn-lg btn-outline-warning mb-3"><b>Добавить комплекс</b></a>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">НАЗВАНИЕ</th>
                <th scope="col">ГОРОД</th>
                <th scope="col">SLUG</th>
                <th scope="col">СОЗДАН</th>
                <th scope="col">ОПЕРАЦИИ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($trks as $trk)
                <tr>
                    <th scope="row">{{ $trk->id }}</th>
                    <td>{{ $trk->name }}</td>
                    <td>{{ $trk->town->name }}</td>
                    <td>{{ $trk->slug }}</td>
                    <td>{{ $trk->created_at }}</td>
                    <td>
                        <form action="{{ route('admin.trks.destroy', $trk->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.trks.show', $trk->id) }}"><i class="nav-icon fas fa-eye mr-2"
                                                                                    style="color: green;  opacity: .7;"
                                                                                    title="Посмотреть"></i></a>
                            <a href="{{ route('admin.trks.edit', $trk->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red; opacity: .7;"
                                    title="Удалить"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                Нет комплексов
            @endforelse
            </tbody>
        </table>
        {{ $trks->links() }}
    </div>
@endsection
