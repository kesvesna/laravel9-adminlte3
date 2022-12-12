@extends('admin.layouts.admin')

@section('title')
    @parent Акты
@endsection

@section('content')
    <br>
    <form method="get" action="{{ route('admin.acts.create') }}" class="mb-3">
        <div class="row">
            <h2>Акты</h2>
            <button class=" btn btn-sm btn-success btn ml-3" type="submit"><b>Создать</b></button>
        </div>
    </form>
    <hr>
        <a href="{{ route('admin.acts.index') }}" class=" btn btn-sm  btn-success    btn-block mb-3"><b>Сбросить все
                фильтры</b></a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>ТРК</th>
                    <th>Статус</th>
                    <th colspan="3">ОПЕРАЦИИ</th>
                </tr>
                <form action="{{ route('admin.acts.index') }}" method="get">
                <tr>
                    <th>
                        <select class="form-control form-control-sm" name="trk_id" aria-label="select" onchange="this.form.submit()">
                            <option selected value="">Все</option>
                            @forelse($trks as $trk)
                                <option value="{{ $trk->id }}" @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif>{{ $trk->name }}</option>
                            @empty
                                <option value="">Нет трк</option>
                            @endforelse
                        </select>
                    </th>
                    <th>
                        <select class="form-control form-control-sm" name="application_status_id" aria-label="select" onchange="this.form.submit()">
                            <option selected value="">Все</option>
                            @forelse($act_statuses as $status)
                                <option value="{{ $status->id }}" @if(isset($old_filters['application_status_id'])){{ $old_filters['application_status_id'] == $status->id ? ' selected' : '' }} @endif>{{ $status->name }}</option>
                            @empty
                                <option value="">Нет статусов</option>
                            @endforelse
                        </select>
                    </th>
                    <th colspan="3"></th>
                </tr>
                </form>
                </thead>
                <tbody>
                @forelse($acts as $act)
                    <tr>
                        <td>{{ $act->trk->name }}</td>
                        <td>{{ $act->act_status->name }}</td>
                        <td>{{ $act->comment }}</td>
                        <td><a href="{{ route('admin.acts.show', $act->id) }}"><i
                                    class="nav-icon fas fa-eye ml-2 mr-2" style="color: green; opacity: .7;"
                                    title="Посмотреть"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.acts.edit', $act->id) }}"><i
                                    class="nav-icon fas fa-edit ml-2 mr-2" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.acts.destroy', $act->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" style="border: none; background-color: transparent;"><i
                                        class="nav-icon fas fa-trash-alt ml-2 mr-2" style="color: red; opacity: .7;"
                                        title="Удалить"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    Нет актов
                @endforelse
                </tbody>
            </table>
            {{ $acts->withQueryString()->links() }}
        </div>
@endsection
