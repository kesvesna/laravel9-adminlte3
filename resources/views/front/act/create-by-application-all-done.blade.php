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
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless">
                            <tbody>
                            <tr>
                                <td>
                                    <span style="color: white;">Дата/Время</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input required type="datetime-local" id="created_at" name="created_at"  value="{{ Carbon\Carbon::now() }}" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color: white;">Тип оборудования/услуга</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select autofocus id="system_type_id" name="system_type_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                        @forelse($systems as $system)
                                            <option value="{{ $system->id }}">{{ $system->name }}</option>
                                        @empty
                                            Нет систем
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        <div class="table-responsive mb-3" style="background: rgba( 255, 255, 255, 0.1 );
                            backdrop-filter: blur( 1px );
                            -webkit-backdrop-filter: blur( 1px );
                            border-radius: 5px;
                            border: 1px solid rgba( 255, 255, 255, 0.18 );">
                            <table class="table table-sm table-borderless">
                                <tbody>
                            <tr class="title_equipment_name">
                                <td colspan="2">
                                    <span style="color: white;">Оборудование</span>
                                </td>
                            </tr>
                            <tr class="body_equipment_name">
                                <td colspan="2">
                                    <select id="equipment_id" name="equipment_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                        <option value="1">ПВ-01-М (ВК 1)</option>
                                        <option value="2">ПВ-02-М (ВК 2)</option>
                                        <option value="3">ПВ-03-М (ВК 3)</option>
                                        <option value="4">ПВ-04-М (ВК 4)</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="add-act-equipment ps-4" style="border: none; background-color: transparent;">
                                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add room" height="35" width="35" title="Добавить оборудование в акт">
                                    </button>
                                </td>
                            </tr>
                            <tr><td><br></td></tr>
                            <tr class="title_act_work">
                                <td colspan="2">
                                    <span style="color: white;">Выполненные работы</span>
                                </td>
                            </tr>
                            <tr class="body_act_work">
                                <td colspan="2">
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
                                </td>
                                <td>
                                    <button type="button" class="add-act-work" style="border: none; background-color: transparent;">
                                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add room" height="35" width="35" title="Добавить работы в акт">
                                    </button>
                                </td>
                            </tr>
                            <tr class="title_act_spare_part_1">
                                <td colspan="2">
                                    <span style="color: white;">Деталь</span>
                                </td>
                                <td colspan="1">
                                    <span style="color: white;">Кол-во</span>
                                </td>
                            </tr>
                            <tr class="body_act_spare_part_1">
                                <td colspan="2">
                                    <select id="spare_part_id" name="spare_part_id" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                        <option value="">Нет</option>
                                        <option value="1">Подшипник</option>
                                        <option value="2">Фильтр карманный приток</option>
                                        <option value="2">Фильтр карманный вытяжка</option>
                                        <option value="3">Ремень приводной</option>
                                        <option value="4">Насос ГВС</option>
                                        <option value="4">Насос дренажный</option>
                                    </select>
                                </td>
                                <td colspan="1">
                                    <input class="form-control" type="number" placeholder="1.0" step="0.1" min="0" max="1000" name="count" value="0.0" style="background: rgba( 255, 255, 255, 0.5 );"/>
                                </td>
                            </tr>
                            <tr class="title_act_spare_part_2">
                                <td >
                                    <span style="color: white;">Модель</span>
                                </td>
                                <td>
                                    <span style="color: white;">Комментарий</span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="body_act_spare_part_2">
                                <td>
                                    <input placeholder="Модель" name="model" id="model" class="form-control" style="background: rgba( 255, 255, 255, 0.5 );">
                                </td>
                                <td>
                                    <textarea placeholder="Комментарий" class="form-control" id="comment" name="comment" rows="1" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="add-act-spare-part" style="border: none; background-color: transparent;">
                                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add room" height="35" width="35" title="Добавить перечень работ в акт">
                                    </button>
                                </td>
                            </tr>
                            <tr class="title_act_text_description_1">
                            <tr>
                                <td><br></td>
                            </tr>
                                <td colspan="2">
                                    <span style="color: white;">Описание работ</span>
                                </td>
                            </tr>
                            <tr class="body_act_text_description_1">
                                <td colspan="2">
                                    <textarea class="form-control" id="works" name="works" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </td>
                            </tr>
                            <tr class="title_act_text_description_2">
                            <tr>
                                <td colspan="2">
                                <span style="color: white;">Замечания</span>
                            </td>
                            </tr>
                            <tr class="body_act_text_description_2">
                                <td colspan="2">
                                    <textarea class="form-control" id="remarks" name="remarks" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </td>
                            </tr>
                            <tr class="title_act_text_description_3">
                                <td colspan="2">
                                    <span style="color: white;">Рекомендации</span>
                                </td>
                            </tr>
                            <tr class="body_act_text_description_3">
                                <td colspan="2">
                                    <textarea class="form-control" id="recommendation" name="recommendation" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </td>
                            </tr>
                            <tr class="title_act_text_description_4">
                                <td colspan="2">
                                    <span style="color: white;">Затраченные ТМЦ</span>
                                </td>
                            </tr>
                            <tr class="body_act_text_description_4">
                                <td colspan="2">
                                    <textarea class="form-control" id="spare_parts" name="spare_parts" rows="2" style="background: rgba( 255, 255, 255, 0.5 );"></textarea>
                                </td>
                            </tr>
                            <tr class="title_act_file">
                                <td colspan="2">
                                    <span style="color: white;">Файлы</span>
                                </td>
                            </tr>
                            <tr class="body_act_file">
                                <td colspan="2">
                                    <input class="form-control" type="file" id="files" multiple name="files[]" accept="image/*, video/*, audio/*">
                                </td>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless">
                                    <tbody>
                            <tr class="title_act_user">
                                <td>
                                    <span style="color: white;">Исполнители</span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="body_act_user">
                                <td>
                                    <select id="user_id" name="user_id[]" class="form-select" style="background: rgba( 255, 255, 255, 0.5 );">
                                        <option value="1">Иванов И.И.</option>
                                        <option value="2">Петров П.П.</option>
                                        <option value="3">Сидоров С.С.</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="add-act-user" style="border: none; background-color: transparent;">
                                        <img src="{{ asset('icons/add.svg') }}" class="rounded" alt="Add room" height="35" width="35" title="Добавить исполнителя в акт">
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <div class="row">
                    <div class="col-12 col-sm-10 col-md-10 col-lg-6 mb-3">
                        <button class="btn btn-danger col-12" type="button">Сохранить</button>
                    </div>
                    <div class="col-12 col-sm-10 col-md-10 col-lg-6 mb-3">
                        <button onClick="history.back()" class="btn btn-success col-12" type="button">Назад</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    @include('front.components.navbar')
</main>
@endsection
