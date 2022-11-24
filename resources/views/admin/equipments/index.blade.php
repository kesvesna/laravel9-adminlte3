@extends('admin.layouts.admin')

@section('title')
    @parent Заявки
@endsection

@section('content')
    <br>
    <form method="get" action="{{ route('admin.equipments.create') }}" class="mb-3">
        <div class="row">
            <h2>Заявки</h2>
            <button class="btn btn-success btn-sm ml-3" type="submit"><b>Создать заявку</b></button>
        </div>
    </form>
    <hr>
        <a href="{{ route('admin.equipments.index') }}" class="btn btn-success btn-sm btn-block mb-3"><b>Сбросить все
                фильтры</b></a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th>ТРК</th>
                    <th colspan="3">ОПЕРАЦИИ</th>
                </tr>
                <form action="{{ route('admin.equipments.index') }}" method="get">
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
                    <th colspan="3"></th>
                </tr>
                </form>
                </thead>
                <tbody>
                @forelse($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->trk->name }}</td>
                        <td><a href="{{ route('admin.equipments.show', $equipment->id) }}"><i
                                    class="nav-icon fas fa-eye ml-2 mr-2" style="color: green; opacity: .7;"
                                    title="Посмотреть"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.equipments.edit', $equipment->id) }}"><i
                                    class="nav-icon fas fa-edit ml-2 mr-2" style="color: darkorange; opacity: .7;"
                                    title="Редактировать"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.equipments.destroy', $equipment->id) }}" method="post">
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
            {{ $equipments->withQueryString()->links() }}
        </div>
@endsection
