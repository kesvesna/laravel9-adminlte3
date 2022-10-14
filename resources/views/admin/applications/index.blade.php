@extends('admin.layouts.admin')

@section('title')
    @parent Заявки
@endsection

@section('content')
    <br>
    <h1>Заявки</h1>
    <a href="{{ route('admin.applications.create') }}" class="btn btn-warning mb-3">Создать заявку</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ТРК</th>
                <th scope="col">КОММЕНТАРИЙ</th>
                <th scope="col">СОЗДАНА</th>
                <th scope="col">ОПЕРАЦИИ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($applications as $application)
                <tr>
                    <th scope="row">{{ $application->id }}</th>
                    <td>{{ $application->trk_id }}</td>
                    <td>{{ $application->comment }}</td>
                    <td>{{ $application->created_at }}</td>
                    <td>
                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.applications.show', $application->id) }}"><i
                                    class="nav-icon fas fa-eye mr-2" style="color: green"></i></a>
                            <a href="{{ route('admin.applications.edit', $application->id) }}"><i
                                    class="nav-icon fas fa-edit mr-3"></i></a>
                            <button type="submit" style="border: none; background-color: transparent;"><i
                                    class="nav-icon fas fa-trash-alt" style="color: red;"></i></button>
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
