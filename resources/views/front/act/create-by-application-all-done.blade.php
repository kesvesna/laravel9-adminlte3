@extends('front.layouts.main')

@section('title')
    @parent | Новый акт
@endsection

@section('content')
<main>
    <div class="container pt-3" style="padding-bottom: 15vh;">
            <form style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );"
                  class="pt-2 pb-2">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h4 style="color: white;">Акт по заявке № {{ $application->id }}</h4>
                            <h5 style="color: white;">Заявка БУДЕТ закрыта</h5>
                        </div>
                    </div>


                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 mb-2">
                        <div class="col mb-2">
                            <label for="created_at" style="color: white;" class="mb-1">Дата/Время</label>
                            <input required type="datetime-local" id="created_at" name="created_at"  value="{{ Carbon\Carbon::now() }}" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                        </div>
                        <div class="col mb-2">
                            <label for="system_type_id" style="color: white;" class="mb-1">Оборудование/Услуга</label>
                            <select autofocus id="system_type_id" name="system_type_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                @forelse($systems as $system)
                                    <option value="{{ $system->id }}">{{ $system->name }}</option>
                                @empty
                                    Нет систем
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="act-equipment p-2" style="background: rgba( 55, 255, 200, 0.1 );
                                                        backdrop-filter: blur( 1px );
                                                        -webkit-backdrop-filter: blur( 1px );
                                                        border-radius: 5px;
                                                        border: 1px solid rgba( 255, 255, 255, 0.18 );">
                        <div class="row row-cols-1 mb-2">
                            <div class="col mb-1">
                                <label for="equipment_id" style="color: white;">Оборудование</label>
                            </div>
                            <div class="col mb-2 input-group">
                                <select id="equipment_id" name="equipment_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                    <option value="1">ПВ-01-М (ВК 1)</option>
                                    <option value="2">ПВ-02-М (ВК 2)</option>
                                    <option value="3">ПВ-03-М (ВК 3)</option>
                                    <option value="4">ПВ-04-М (ВК 4)</option>
                                </select>
                                <button type="button" class="add-act-equipment ps-2" style="border: none; background-color: transparent;">
                                    <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add equipment" height="35" width="35" title="Добавить оборудование в акт">
                                </button>
                            </div>
                        </div>
                        <div class="act-works p-2"  style="background: rgba( 55, 5, 100, 0.1 );
                                                        backdrop-filter: blur( 1px );
                                                        -webkit-backdrop-filter: blur( 1px );
                                                        border-radius: 5px;
                                                        border: 1px solid rgba( 255, 255, 255, 0.18 );">
                            <div class="row row-cols-1 mb-2">
                                <div class="col mb-1">
                                    <label for="work_type_id" style="color: white;">Выполненные работы</label>
                                </div>
                                <div class="col mb-2 input-group">
                                    <select id="work_type_id" name="work_type_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                        <option value="1">Замена</option>
                                        <option value="2">Чистка сухая</option>
                                        <option value="2">Чистка влажная</option>
                                        <option value="3">Ремонт</option>
                                        <option value="4">ТО-1</option>
                                        <option value="5">ТО-2</option>
                                        <option value="6">ТО-3</option>
                                        <option value="7">ТО-4</option>
                                        <option value="8">ТО-5</option>
                                        <option value="9">ТО-6</option>
                                        <option value="10">ТО-7</option>
                                    </select>
                                    <button type="button" class="add-act-work ps-2" style="border: none; background-color: transparent;">
                                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add work" height="35" width="35" title="Добавить вид работ в акт">
                                    </button>
                                </div>
                            </div>

                            <div class="act-spare-parts p-2"  style="background: rgba( 5, 100, 150, 0.1 );
                                                        backdrop-filter: blur( 1px );
                                                        -webkit-backdrop-filter: blur( 1px );
                                                        border-radius: 5px;
                                                        border: 1px solid rgba( 255, 255, 255, 0.18 );">
                                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2">
                                    <div class="col mb-2">
                                        <label for="spare_part_id" style="color: white;">Деталь (необязательно)</label>
                                        <select id="spare_part_id" name="spare_part_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                            <option value="">Нет</option>
                                            <option value="1">Подшипник</option>
                                            <option value="2">Фильтр карманный приток</option>
                                            <option value="2">Фильтр карманный вытяжка</option>
                                            <option value="3">Ремень приводной</option>
                                            <option value="4">Насос ГВС</option>
                                            <option value="4">Насос дренажный</option>
                                        </select>
                                    </div>
                                    <div class="col mb-2">
                                        <label for="count" style="color: white;">Кол-во</label>
                                        <input class="form-control" type="number" placeholder="1.0" step="0.1" min="0" max="1000" name="count" value="0.0" style="background: rgba( 255, 255, 255, 0.5 );"/>
                                    </div>
                                    <div class="col mb-2">
                                        <label for="model" style="color: white;">Модель</label>
                                        <input placeholder="Модель" name="model" id="model" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                                    </div>
                                    <div class="col mb-2">
                                        <label for="comment" style="color: white;">Комментарий</label>
                                        <div class="input-group">
                                            <textarea placeholder="Комментарий" class="form-control" id="comment" name="comment" rows="1" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                            <button type="button" class="add-act-spare-part ps-2" style="border: none; background-color: transparent;">
                                                <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add spare part" height="35" width="35" title="Добавить деталь в акт">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="act-description pt-3">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col mb-3">
                                    <label for="works" style="color: white;">Описание работ (необязательно)</label>
                                    <textarea class="form-control" id="works" name="works" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </div>
                                <div class="col mb-3">
                                    <label for="remarks" style="color: white;">Замечания (необязательно)</label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col mb-3">
                                    <label for="recommendations" style="color: white;">Рекомендации (необязательно)</label>
                                    <textarea class="form-control" id="recommendations" name="recommendations" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </div>
                                <div class="col mb-3">
                                    <label for="remarks" style="color: white;">Затраченные тмц (необязательно)</label>
                                    <textarea class="form-control" id="spare_parts" name="spare_parts" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="act-files">
                            <div class="row row-cols-1">
                                <div class="col mb-3">
                                    <input class="form-control" type="file" id="files" multiple name="files[]" accept="image/*, video/*, audio/*">
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
                                <select id="user_id" name="user_id[]" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                    <option value="1">Иванов И.И.</option>
                                    <option value="2">Петров П.П.</option>
                                    <option value="3">Сидоров С.С.</option>
                                </select>
                                <button type="button" class="add-act-user ps-2" style="border: none; background-color: transparent;">
                                    <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add user" height="35" width="35" title="Добавить исполнителя в акт">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 pt-2">
                        <div class="col mb-2">
                            <button class="btn btn-danger col-12" type="button">Сохранить</button>
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
