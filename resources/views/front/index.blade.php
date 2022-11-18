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
                                        <a href="{{ route('front.applications.index') }}" style="color: black;">Заявки</a>
                                    </h4>
                                </label>
                            </div>

                            <div class="col-8 col-sm-7 col-md-7">
                                <form action="{{ route('front.applications.index') }}" method="get">
                                <div class="input-group">
                                    <input autofocus type="search" id="comment" required name="comment" placeholder="Поиск" class="form-control" aria-describedby="search_application">
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
                                        <a href="{{ route('front.repair.index') }}" style="color: black;">Ремонт</a>
                                    </h4>
                                </label>
                            </div>

                            <div class="col-8 col-sm-7 col-md-7">
                                <form action="{{ route('front.repair.index') }}" method="get">
                                    <div class="input-group">
                                        <input autofocus type="search" id="comment" required name="comment" placeholder="Поиск" class="form-control" aria-describedby="search_repair">
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
                                <label for="search_act" class="col-form-label"><h4><a href="act/index.blade.php" style="color: black;">Акты</a></h4></label>
                            </div>
                            <div class="col-8 col-sm-7 col-md-8">
                                <div class="input-group">
                                    <input type="search" id="search_act" placeholder="Поиск" class="form-control" aria-describedby="search_act">
                                    <button class="btn">
                                        <img src="icons/search.svg" alt="Search repair" width="30" height="30">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <p class="new__applications" style=""><a href="act/index.blade.php" style="color: darkred; padding: 0 0 0 1rem;"><b>По
                        заявкам:</b> </a>34</p>
                    <hr>
                    <p class="in_progress__applications" style=""><a href="act/index.blade.php"
                                                                     style="color: yellow; padding: 0 0 0 1rem;"><b>По
                        плану:</b> </a>45</p>
                    <div class="position-relative">
                        <div class="position-absolute end-0 my-3" >
                            <a href="act/create.blade.php" title="Заполнить акт">
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

