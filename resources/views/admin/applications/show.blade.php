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
            <td>{{ $application->trk_id }}</td>
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
            <a href="{{ route('admin.applications.index') }}" class="btn btn-success mr-3">К заявкам</a>
            <a href="{{ route('admin.applications.edit', $application->id) }}" class="btn btn-warning mr-3">Редактировать</a>
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>



@endsection
