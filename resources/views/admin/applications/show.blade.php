@extends('admin.layouts.admin')

@section('title')
    @parent Заявка
@endsection

@section('content')
    <br>
    <h2>Заявка {{ $application->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $application->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создана</th>
            <td>{{ $application->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">ТРК</th>
            <td>{{ $application->trk->name }}</td>
        </tr>
        <tr>
            <th scope="row">Статус</th>
            <td>{{ $application->currentHistory->application_status->name }}</td>
        </tr>
        <tr>
            <th scope="row">Подразделение</th>
            <td>{{ $application->currentHistory->service->name }}</td>
        </tr>
        <tr>
            <th scope="row">Комментарий</th>
            <td>{{ $application->comment }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('admin.applications.destroy', $application->id) }}" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('admin.applications.index') }}" class="btn btn-success mr-3">Назад</a>
        <a href="{{ route('admin.applications.edit', $application->id) }}"
           class="btn btn-warning mr-3">Редактировать</a>
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    <br>
    <h4>История заявки №{{ $application->id }}</h4>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
            <tr>
                <th scope="col" class="col-3">Дата</th>
                <th scope="col" class="col-3">Статус</th>
                <th scope="col" class="col-3">Подразделение</th>
                <th scope="col" class="col-3">От</th>
                <th scope="col" class="col-3">Ответственный</th>
            </tr>
            @forelse($application->histories as $history)
            <tr>
                <td>{{ $history->created_at }}</td>
                <td>{{ $history->application_status->name }}</td>
                <td>{{ $history->service->name }}</td>
                <td>{{ $history->user->name }}</td>
                <td>{{ $history->responsible_user->name ? $history->responsible_user->name : 'Нет' }}</td>
            </tr>
        @empty
            Нет историй
        @endforelse
        </tbody>
    </table>

@endsection
