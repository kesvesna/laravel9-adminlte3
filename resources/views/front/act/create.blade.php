@extends('front.layouts.main')

@section('title')
    @parent | Новый акт
@endsection

@section('content')
    <main>
        <div class="container pt-3" style="padding-bottom: 15vh;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form class="pt-3 pb-2" method="post" action="{{ route('front.acts.store') }}" enctype="multipart/form-data"
                  style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 2px solid rgba( 255, 255, 255, 0.18 );">
                @csrf
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-12">
                            <input hidden name="application_id" value="">
                            <h4 style="color: white;">Новый акт</h4>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-2">
                        <div class="col mb-2">
                            <label for="date" style="color: white;" class="mb-1">Дата/Время</label>
                            <input required type="datetime-local" name="date"  value="{{ Carbon\Carbon::now() }}" class="form-control form-control-sm" style="background: rgba( 255, 255, 255, 0.5 );">
                        </div>
                        <div class="col mb-2">
                            <label for="trk_id" style="color: white;" class="mb-1">Торговый комплекс</label>
                            <select autofocus id="trk_id" name="trk_id" class="form-select form-select-sm" style="background: rgba( 255, 255, 255, 0.5 );">
                                @forelse($trks as $trk)
                                    <option value="{{ $trk->id }}">{{ $trk->name }}</option>
                                @empty
                                    Нет трк
                                @endforelse
                            </select>
                        </div>
                        <div class="col mb-2">
                            <label for="system_type_id" style="color: white;" class="mb-1">Система/Услуга</label>
                            <select autofocus id="system_type_id" name="system_type_id" class="form-select form-select-sm" style="background: rgba( 255, 255, 255, 0.5 );">
                                <option value="">Выберите ...</option>
                                @forelse($systems as $system)
                                    <option value="{{ $system->id }}">{{ $system->name }}</option>
                                @empty
                                    Нет систем
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="equipments">
                        <div class="act-equipment p-2" style="background: rgba( 55, 255, 200, 0.1 );
                                                        backdrop-filter: blur( 1px );
                                                        -webkit-backdrop-filter: blur( 1px );
                                                        border-radius: 5px;
                                                        border: 2px solid rgba( 255, 255, 255, 0.18 );" id="Equipment[0]">
                            <div class="row row-cols-1 mb-2">
                                <div class="col mb-1">
                                    <label for="id" style="color: white;">Оборудование</label>
                                </div>
                                <div class="col mb-2 input-group">
                                    <select name="Equipment[0][id]" class="form-select form-select-sm equipment" style="background: rgba( 255, 255, 255, 0.5 );">
                                        <option value="">Выберите ...</option>
                                        @forelse($equipments as $equipment)
                                            <option value="{{$equipment->id}}">{{$equipment->name->name  }}&nbsp;&nbsp;{{'(' . $equipment->room->room->name . ')'}}</option>
                                        @empty
                                            Нет оборудования
                                        @endforelse
                                    </select>
                                    <button type="button" class="add-act-equipment ps-2" style="border: none; background-color: transparent;">
                                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add equipment" height="35" width="35" title="Добавить оборудование в акт">
                                    </button>
                                </div>
                                <div class="mt-2 mb-1 d-flex flex-lg-row-reverse">
                                    <label class="form-check-label" for="copy_works" style="color: white; font-size: 0.75em;">
                                        Копировать работы в следующее оборудование
                                    </label>
                                    <input class="form-check-input mt-0 ms-2 me-2" type="checkbox" value="" id="copy_works_1">

                                </div>

                            </div>

                            <div class="act-works p-2"  style="background: rgba( 55, 5, 100, 0.1 );
                                                        backdrop-filter: blur( 1px );
                                                        -webkit-backdrop-filter: blur( 1px );
                                                        border-radius: 5px;
                                                        border: 2px solid rgba( 255, 255, 255, 0.18 );">
                                <div class="row row-cols-1 mb-2">
                                    <div class="col mb-1">
                                        <label for="work_type_id" style="color: white;">Выполненные работы</label>
                                    </div>
                                    <div class="col mb-2 input-group">
                                        <select name="Equipment[0][work_ids][0][id]" class="form-select form-select-sm equipment-work" style="background: rgba( 255, 255, 255, 0.5 );">
                                            <option value="">Выберите ...</option>
                                            @forelse($works as $works)
                                                <option value="{{$works->id}}">{{$works->name}}</option>
                                            @empty
                                                Нет деталей
                                            @endforelse
                                        </select>
                                        <button type="button" class="add-act-work ps-2" style="border: none; background-color: transparent;">
                                            <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add work" height="35" width="35" title="Добавить вид работ в акт">
                                        </button>
                                    </div>
                                </div>
                                <div class="accordion">
                                    <div class="accordion-item" style="background: transparent;">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button style="background: transparent; color: white;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapseOne">
                                                Использованные детали (необязательно)
                                            </button>
                                        </h2>
                                        <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body" style="padding: 0;">
                                                <div class="act-spare-parts p-2 m-1 mt-2"  style="background: rgba( 5, 100, 150, 0.1 );
                                                        backdrop-filter: blur( 1px );
                                                        -webkit-backdrop-filter: blur( 1px );
                                                        border-radius: 5px;
                                                        border: 2px solid rgba( 255, 255, 255, 0.18 );">
                                                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2">
                                                        <div class="col mb-2">
                                                            <label for="spare_part_id" style="color: white;">Деталь</label>
                                                            <select name="Equipment[0][work_ids][0][spare_part_ids][0][id]" class="form-select form-select-sm work-spare-part" style="background: rgba( 255, 255, 255, 0.5 );">
                                                                <option value="">Выберите ...</option>
                                                                @forelse($spare_parts as $spare_part)
                                                                    <option value="{{$spare_part->id}}">{{$spare_part->name}}</option>
                                                                @empty
                                                                    Нет деталей
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="col mb-2">
                                                            <label for="count" style="color: white;">Кол-во</label>
                                                            <input class="form-control form-control-sm" type="number" placeholder="1.0" step="0.1" min="0" max="1000" name="Equipment[0][work_ids][0][spare_part_ids][0][count]" style="background: rgba( 255, 255, 255, 0.5 );"/>
                                                        </div>
                                                        <div class="col mb-2">
                                                            <label for="model" style="color: white;">Модель</label>
                                                            <input placeholder="Модель" name="Equipment[0][work_ids][0][spare_part_ids][0][model]" class="form-control form-control-sm" style="background: rgba( 255, 255, 255, 0.5 );">
                                                        </div>
                                                        <div class="col mb-2">
                                                            <label for="comment" style="color: white;">Комментарий</label>
                                                            <div class="input-group">
                                                                <textarea placeholder="Комментарий" class="form-control form-control-sm" name="Equipment[0][work_ids][0][spare_part_ids][0][comment]" rows="1" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                                                <button type="button" class="add-act-spare-part ps-2" style="border: none; background-color: transparent;">
                                                                    <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add spare part" height="35" width="35" title="Добавить деталь в акт">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="act-description pt-3">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col mb-3">
                                        <label for="works" style="color: white;">Описание работ (необязательно)</label>
                                        <textarea class="form-control form-control-sm" name="Equipment[0][works]" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="remarks" style="color: white;">Замечания (необязательно)</label>
                                        <textarea class="form-control form-control-sm" name="Equipment[0][remarks]" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col mb-3">
                                        <label for="recommendations" style="color: white;">Рекомендации (необязательно)</label>
                                        <textarea class="form-control form-control-sm" name="Equipment[0][recommendations]" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="remarks" style="color: white;">Затраченные тмц (необязательно)</label>
                                        <textarea class="form-control form-control-sm" placeholder="тмц - технические материальные ценности" name="Equipment[0][spare_parts]" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="act-files">
                                <div class="row row-cols-1">
                                    <div class="col mb-3">
                                        <input class="form-control form-control-sm" type="file" multiple name="Equipment[0][files][]" accept="image/*, video/*, audio/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="act-users pt-2">
                        <div class="row row-cols-1">
                            <div class="col mb-2">
                                <label for="users" style="color: white;">Исполнители</label>
                            </div>
                            <div class="col mb-2 input-group">
                                <select name="user_id[]" class="form-select form-select-sm" style="background: rgba( 255, 255, 255, 0.5 );">
                                    @forelse($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @empty
                                        Нет исполнителей
                                    @endforelse
                                </select>
                                <button type="button" class="add-act-user ps-2" style="border: none; background-color: transparent;">
                                    <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add user" height="35" width="35" title="Добавить исполнителя в акт">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 pt-2">
                        <div class="col mb-2">
                            <button class="btn btn-danger col-12" type="submit">Сохранить</button>
                        </div>
                        <div class="col mb-2">
                            <button onClick="history.back()" class="btn btn-success col-12" type="button">Назад</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @include('front.components.navbar')
    </main>
@endsection
