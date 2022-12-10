@extends('admin.layouts.admin')

@section('title')
    @parent Главная
@endsection

@section('content')
    <br>
    <p>Новые заявки:</p>
    @forelse($new_applications as $application)
        {{ 'id ' . $application->id . ', comment' . $application->comment }}<br>
    @empty
        Нет новых заявок
    @endforelse
    @if(count($in_progress_applications) > 0)
    <hr>
    <p>Заявки в обработке:</p>
    @forelse($in_progress_applications as $application)
        {{ 'id ' . $application->id . ', comment' . $application->comment }}<br>
    @empty
        Нет заявок в обработке
    @endforelse
    @endif
    @if(count($repairs_by_application) > 0)
        <hr>
        <p>Ремонт по заявкам:</p>
        @forelse($repairs_by_application as $repair)
            {{ 'id ' . $repair->id . ', comment' . $repair->comment }}<br>
        @empty
            Нет ремонта по заявкам
        @endforelse
    @endif
    @if(count($repairs_by_plan) > 0)
        <hr>
        <p>Ремонт по заявкам:</p>
        @forelse($repairs_by_plan as $repair)
            {{ 'id ' . $repair->id . ', comment' . $repair->comment }}<br>
        @empty
            Нет ремонта по плану
        @endforelse
    @endif
    <hr>
    <p>Закупка запчастей:</p>
    <hr>
    <p>Уборка???</p>
    <hr>
    <p>???</p>
@endsection
