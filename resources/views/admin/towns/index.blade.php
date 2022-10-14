@extends('admin.layouts.admin')

@section('title')
    @parent Города
@endsection

@section('content')
    <br>
        <h1>Города</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">НАЗВАНИЕ</th>
                    <th scope="col">SLUG</th>
                    <th scope="col">СОЗДАН</th>
                    <th scope="col">ОПЕРАЦИИ</th>
                </tr>
                </thead>
                <tbody>
                @forelse($towns as $town)
                    <tr>
                        <th scope="row">{{ $town->id }}</th>
                        <td>{{ $town->name }}</td>
                        <td>{{ $town->slug }}</td>
                        <td>{{ $town->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.towns.show', $town->id) }}"><i class="nav-icon fas fa-eye mr-2" style="color: green"></i></a>
                            <a href="{{ route('admin.towns.edit', $town->id) }}"><i class="nav-icon fas fa-edit mr-3"></i></a>
                            <a href="{{ route('admin.towns.destroy', $town->id) }}"><i class="nav-icon fas fa-trash-alt" style="color: red"></i></a>
                        </td>
                    </tr>
                @empty
                    Нет городов
                @endforelse
                </tbody>
            </table>
            {{ $towns->links() }}
        </div>
@endsection
