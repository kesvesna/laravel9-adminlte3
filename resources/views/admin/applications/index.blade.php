@extends('admin.layouts.admin')

@section('title')
    @parent Заявки
@endsection

@section('content')
    <br>
        <form method="get" action="{{ route('admin.applications.create') }}" class="mb-3">
            <div class="row">
                <h2>Заявки</h2>
                <button class="btn btn-success btn-sm ml-3" type="submit"><b>Создать заявку</b></button>
            </div>
        </form>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ТРК</th>
                <th scope="col">КОММЕНТАРИЙ</th>
                <th scope="col">СОЗДАНА</th>
                <th colspan="3">ОПЕРАЦИИ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($applications as $application)
                <tr>
                    <th scope="row">{{ $application->id }}</th>
                    <td>{{ $application->trk_id }}</td>
                    <td>{{ $application->comment }}</td>
                    <td>{{ $application->created_at }}</td>
                    <td> <a href="{{ route('admin.applications.show', $application->id) }}"><i
                                class="nav-icon fas fa-eye ml-2 mr-2" style="color: green; opacity: .7;"
                                title="Посмотреть"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('admin.applications.edit', $application->id) }}"><i
                                class="nav-icon fas fa-edit ml-2 mr-2" style="color: darkorange; opacity: .7;"
                                title="Редактировать"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="post">
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
        {{ $applications->links() }}
    </div>
@endsection
