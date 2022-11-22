@extends('admin.layouts.admin')

@section('title')
    @parent Ремонт
@endsection

@section('content')
    <br>
    <form method="get" action="{{ route('admin.repairs.create') }}" class="mb-3">
        <div class="row">
            <h2>Ремонт</h2>
            <button class="btn btn-success btn-sm ml-3" type="submit"><b>Запланировать ремонт</b></button>
        </div>
    </form>
    <hr>
        <a href="{{ route('admin.repairs.index') }}" class="btn btn-success btn-sm btn-block mb-3"><b>Сбросить все
                фильтры</b></a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>ТРК</th>
                    <th>Статус</th>
                    <th>КОММЕНТАРИЙ</th>
                    <th colspan="3">ОПЕРАЦИИ</th>
                </tr>
                <form action="{{ route('admin.repairs.index') }}" method="get">
                <tr>
                    <th>
                        <select class="form-control" name="trk_id" aria-label="select" onchange="this.form.submit()">
                            <option selected value="">Все</option>
                            @forelse($trks as $trk)
                                <option value="{{ $trk->id }}" @if(isset($old_filters['trk_id'])){{ $old_filters['trk_id'] == $trk->id ? ' selected' : '' }} @endif>{{ $trk->name }}</option>
                            @empty
                                <option value="">Нет трк</option>
                            @endforelse
                        </select>
                    </th>
                    <th>
                        <select class="form-control" name="repair_status_id" aria-label="select" onchange="this.form.submit()">
                            <option selected value="">Все</option>
                            @forelse($repair_statuses as $status)
                                <option value="{{ $status->id }}" @if(isset($old_filters['repair_status_id'])){{ $old_filters['repair_status_id'] == $status->id ? ' selected' : '' }} @endif>{{ $status->name }}</option>
                            @empty
                                <option value="">Нет статусов</option>
                            @endforelse
                        </select>
                    </th>
                    <th>
                        <input type="text" value="@if(isset($old_filters['comment'])) {{ $old_filters['comment'] }} @endif"
                               class="form-control" id="comment" name="comment">
                    </th>
                    <th colspan="3"></th>
                </tr>
                </form>
                </thead>
                <tbody>
                @forelse($repairs as $repair)
                    <tr>
                        <td>{{ $repair->trk->name }}</td>
                        <td>{{ $repair->currentHistory->repair_status->name }}</td>
                        <td>{{ $repair->comment }}</td>
                        <td><a href="{{ route('admin.repairs.show', $repair->id) }}"><i
                                    class="nav-icon fas fa-eye ml-2 mr-2" style="color: green; opacity: .7;"
                                    title="Посмотреть"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.repairs.edit', $repair->id) }}"><i
                                    class="nav-icon fas fa-edit ml-2 mr-2" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.repairs.destroy', $repair->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" style="border: none; background-color: transparent;"><i
                                        class="nav-icon fas fa-trash-alt ml-2 mr-2" style="color: red; opacity: .7;"
                                        title="Удалить"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    Нет ремонтов
                @endforelse
                </tbody>
            </table>
            {{ $repairs->withQueryString()->links() }}
        </div>
@endsection
