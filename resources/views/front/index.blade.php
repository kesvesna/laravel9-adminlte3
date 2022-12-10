@extends('front.layouts.main')

@section('title')
    @parent Главная
@endsection

@section('content')
<main>
    <div class="container-fluid justify-content-end">
        <div class="empty-block pt-5"></div>
        <div class="row pt-lg-5">
            <div class="owl-carousel owl-theme align-bottom" id="top-carousel">

                <div class="top-slide">
                    <div class="slide__title p-1">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-auto ms-2">
                                <label for="search_application" class="col-form-label">
                                    <h4>
                                        <a href="{{ route('front.applications.index') }}" style="color: white;">Заявки</a>
                                    </h4>
                                </label>
                            </div>

                            <div class="col-8 col-sm-7 col-md-7">
                                <form action="{{ route('front.applications.index') }}" method="get">
                                <div class="input-group">
                                    <input style="background: rgba( 255, 255, 255, 0.2 );
                                                    backdrop-filter: blur( 1px );
                                                    -webkit-backdrop-filter: blur( 1px );
                                                    border-radius: 3px;"
                                           autofocus type="search" id="comment" required name="comment"
                                           placeholder="Поиск" class="form-control form-control-sm"
                                           aria-describedby="search_application">
                                    <button class="btn" type="submit">
                                        <img src="{{ asset('icons/search.svg') }}" alt="Search application" width="30" height="30">
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <form action="{{ route('front.applications.index') }}" method="get" class="ms-2">
                        <input hidden name="application_status_id" value="1">
                        <button class="btn" type="submit" style="background-color: transparent;"><b style="color: darkred;">Новые: {{ $new_applications_count }}</b></button>
                    </form>
                    <hr>
                    <form action="{{ route('front.applications.index') }}" method="get" class="mb-3 ms-2">
                        <input hidden name="application_status_id" value="2">
                        <button class="btn" type="submit" style="background-color: transparent;"><b style="color: yellow;">В обработке: {{ $in_progress_applications_count }}</b></button>
                    </form>
                    <div class="position-relative">
                        <div class="position-absolute end-0 my-3" >
                            <a href="{{ route('front.chat.index') }}" title="Подать заявку">
                                <img src="./icons/plus.svg" alt="Add picture" width="40" height="40">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="top-slide">
                    <div class="slide__title p-1">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-auto ms-2">
                                <label for="search_application" class="col-form-label">
                                    <h4>
                                        <a href="{{ route('front.repair.index') }}" style="color: white;">Ремонт</a>
                                    </h4>
                                </label>
                            </div>

                            <div class="col-8 col-sm-7 col-md-7">
                                <form action="{{ route('front.repair.index') }}" method="get">
                                    <div class="input-group">
                                        <input  style="background: rgba( 255, 255, 255, 0.2 );
                                                    backdrop-filter: blur( 1px );
                                                    -webkit-backdrop-filter: blur( 1px );
                                                    border-radius: 3px;" autofocus type="search" id="comment" required name="comment" placeholder="Поиск" class="form-control form-control-sm" aria-describedby="search_repair">
                                        <button class="btn" type="submit">
                                            <img src="{{ asset('icons/search.svg') }}" alt="Search repair" width="30" height="30">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <form action="{{ route('front.repair.index') }}" method="get" class="ms-2">
                        <input hidden name="repair_status_id" value="2">
                        <button class="btn" type="submit" style="background-color: transparent;"><b style="color: darkred;">По заявкам: {{ $repair_by_application_count }}</b></button>
                    </form>
                    <hr>
                    <form action="{{ route('front.repair.index') }}" method="get" class="mb-3 ms-2">
                        <input hidden name="repair_status_id" value="1">
                        <button class="btn" type="submit" style="background-color: transparent;"><b style="color: yellow;">По плану: {{ $repair_by_plan_count }}</b></button>
                    </form>
                    <div class="position-relative">
                        <div class="position-absolute end-0 my-3" >
                            <a href="{{ route('front.repair.create') }}" title="Запланировать ремонт">
                                <img src="./icons/plus.svg" alt="Add picture" width="40" height="40">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="top-slide">
                    <div class="slide__title p-1">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-auto ms-2">
                                <label for="search_application" class="col-form-label">
                                    <h4>
                                        <a href="{{ route('front.acts.index') }}" style="color: white;">Акты</a>
                                    </h4>
                                </label>
                            </div>

                            <div class="col-8 col-sm-7 col-md-7">
                                <form action="{{ route('front.acts.index') }}" method="get">
                                    <div class="input-group">
                                        <input  style="background: rgba( 255, 255, 255, 0.2 );
                                                    backdrop-filter: blur( 1px );
                                                    -webkit-backdrop-filter: blur( 1px );
                                                    border-radius: 3px;" autofocus type="search" id="comment" required name="comment" placeholder="Поиск" class="form-control form-control-sm" aria-describedby="search_act">
                                        <button class="btn" type="submit">
                                            <img src="{{ asset('icons/search.svg') }}" alt="Search act" width="30" height="30">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <form action="{{ route('front.acts.index') }}" method="get" class="ms-2">
                        <input hidden name="act_status_id" value="1">
                        <button class="btn" type="submit" style="background-color: transparent;"><b style="color: darkgreen;">По плану: {{ $act_by_plan_count }}</b></button>
                    </form>
                    <hr>
                    <form action="{{ route('front.acts.index') }}" method="get" class="ms-2 mb-3">
                        <input hidden name="act_status_id" value="2">
                        <button class="btn" type="submit" style="background-color: transparent;"><b style="color: yellow;">По заявкам: {{ $act_by_application_count }}</b></button>
                    </form>
                    <div class="position-relative">
                        <div class="position-absolute end-0 my-3" >
                            <a href="{{ route('front.acts.create') }}" title="Заполнить акт">
                                <img src="./icons/plus.svg" alt="Add picture" width="40" height="40">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.components.navbar')
</main>
@endsection

