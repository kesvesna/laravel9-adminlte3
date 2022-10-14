@extends('admin.layouts.admin')

@section('title')
    @parent Редактирование заявки
@endsection

@section('content')
    <form action="{{ route('admin.applications.update', $application->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="trk_id" class="form-label">TRK_ID</label>
            <input type="text" class="form-control" id="trk_id" name="trk_id" value="{{ $application->trk_id }}">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea type="text" class="form-control" id="comment"
                      name="comment">{{ $application->comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mr-3">Сохранить</button>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-success">К заявкам</a>
    </form>
@endsection
