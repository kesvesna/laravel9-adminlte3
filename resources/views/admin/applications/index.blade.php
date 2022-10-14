@extends('admin.layouts.admin')

@section('title')
    @parent Заявки
@endsection

@section('content')
    <br>
        <h1>Заявки</h1>
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
                            <a href="{{ route('admin.applications.show', $application->id) }}"><i class="nav-icon fas fa-eye mr-2" style="color: green"></i></a>
                            <a href="{{ route('admin.applications.edit', $application->id) }}"><i class="nav-icon fas fa-edit mr-3"></i></a>
                            <a href="{{ route('admin.applications.destroy', $application->id) }}"><i class="nav-icon fas fa-trash-alt" style="color: red"></i></a>
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
