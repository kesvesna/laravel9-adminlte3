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
    <hr>
    <form action="{{ route('admin.applications.index') }}" method="get">
        @csrf
      <a href="{{ route('admin.applications.index') }}" class="btn btn-success btn-sm btn-block mb-3"><b>Сбросить все фильтры</b></a>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead>
            <tr>
                <th>ТРК</th>
                <th>КОММЕНТАРИЙ К ЗАЯВКЕ</th>
                <th colspan="3">ОПЕРАЦИИ</th>
            </tr>
            <tr>
                <th>
                        <select class="form-control" aria-label="select">
                            <option selected>Все</option>
                            @forelse($trks as $trk)
                                <option value="{{ $trk->id }}">{{ $trk->name }}</option>
                            @empty
                                <option value="0">Нет трк</option>
                            @endforelse
                        </select>
                </th>
                <th>
                    <input type="text" value="{{ old('comment') }}" class="form-control" id="comment" name="comment">
                </th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($applications as $application)
                <tr>
                    <td>{{ $application->trk->name }}</td>
                    <td>{{ $application->comment }}</td>
                    <td><a href="{{ route('admin.applications.show', $application->id) }}"><i
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
        {{ $applications->withQueryString()->links() }}
    </div>
@endsection
