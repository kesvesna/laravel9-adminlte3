@extends('admin.layouts.admin')

@section('title')
    @parent Статусы пользователей
@endsection

@section('content')
    <br>
    <form method="get" action="{{ route('admin.user_statuses.create') }}" class="mb-3">
        <div class="row">
            <h2>Статусы</h2>
            <button class="btn btn-success btn-sm ml-3" type="submit"><b>Создать</b></button>
        </div>
    </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>Статус</th>
                    <th colspan="3">ОПЕРАЦИИ</th>
                </tr>
                </thead>
                <tbody>
                @forelse($user_statuses as $status)
                    <tr>
                        <td>{{ $status->name }}</td>
                        <td><a href="{{ route('admin.user_statuses.show', $status->id) }}"><i
                                    class="nav-icon fas fa-eye ml-2 mr-2" style="color: green; opacity: .7;"
                                    title="Посмотреть"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.user_statuses.edit', $status->id) }}"><i
                                    class="nav-icon fas fa-edit ml-2 mr-2" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.user_statuses.destroy', $status->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" style="border: none; background-color: transparent;"><i
                                        class="nav-icon fas fa-trash-alt ml-2 mr-2" style="color: red; opacity: .7;"
                                        title="Удалить"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    Нет заявок
                @endforelse
                </tbody>
            </table>
            {{ $user_statuses->withQueryString()->links() }}
        </div>
@endsection
