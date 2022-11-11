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
                                        <a href="./application/index.html" style="color: black;">Заявки</a>
                                    </h4>
                                </label>
                            </div>
                            <div class="col-8 col-sm-7 col-md-7">
                                <div class="input-group">
                                    <input autofocus type="search" id="search_application" placeholder="Поиск" class="form-control" aria-describedby="search_application">
                                    <button class="btn">
                                        <img src="icons/search.svg" alt="Search application" width="30" height="30">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <a href="./application/index.html" style="padding: 0 0 0 1rem;"><b style="color: darkred;">Новые:</b></a><span> 2</span>
                    <hr>
                    <p class="in_progress__applications" style=""><a href="./application/index.html"
                                                                     style="color: yellow; padding: 0 0 0 1rem;"><b>В
                        обработке:</b> </a>5</p>
                    <hr>
                    <p class="closed__applications" style=""><a href="./application/index.html" style="color: lightgreen; padding: 0 0 0 1rem;"><b>Закрытые:</b>
                    </a>23</p>
                    <div class="position-relative">
                        <div class="position-absolute end-0 my-3" >
                            <a href="chat/index.blade.php" title="Подать заявку">
                                <img src="./icons/plus.svg" alt="Add picture" width="40" height="40">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="top-slide">
                    <div class="slide__title p-1">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-auto ms-2">
                                <label for="search_repair" class="col-form-label"><h4><a href="./repair/index.html" style="color: black;">Ремонт</a></h4></label>
                            </div>
                            <div class="col-8 col-sm-7 col-md-7">
                                <div class="input-group">
                                    <input type="search" id="search_repair" placeholder="Поиск" class="form-control" aria-describedby="search_repair">
                                    <button class="btn">
                                        <img src="icons/search.svg" alt="Search application" width="30" height="30">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <p class="new__applications" style=""><a href="./repair/index.html" style="color: darkred; padding: 0 0 0 1rem;"><b>По
                        заявкам:</b> </a>4</p>
                    <hr>
                    <p class="in_progress__applications" style=""><a href="./repair/index.html"
                                                                     style="color: yellow; padding: 0 0 0 1rem;"><b>По
                        плану:</b> </a>2</p>
                    <hr>
                    <p class="closed__applications" style=""><a href="./repair/index.html" style="color: lightgreen; padding: 0 0 0 1rem;"><b>Закрытый:</b>
                    </a>15</p>
                    <div class="position-relative">
                        <div class="position-absolute end-0 my-3" >
                            <a href="repair/create_by_plan.html" title="Запланировать ремонт">
                                <img src="./icons/plus.svg" alt="Add picture" width="40" height="40">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="top-slide">
                    <div class="slide__title p-1">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-auto ms-2">
                                <label for="search_act" class="col-form-label"><h4><a href="./act/index.html" style="color: black;">Акты</a></h4></label>
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
                    <p class="new__applications" style=""><a href="./act/index.html" style="color: darkred; padding: 0 0 0 1rem;"><b>По
                        заявкам:</b> </a>34</p>
                    <hr>
                    <p class="in_progress__applications" style=""><a href="./act/index.html"
                                                                     style="color: yellow; padding: 0 0 0 1rem;"><b>По
                        плану:</b> </a>45</p>
                    <hr>
                    <p class="closed__applications" style=""><a href="./act/index.html" style="color: lightgreen; padding: 0 0 0 1rem;"><b>Все:</b>
                    </a>79</p>
                    <div class="position-relative">
                        <div class="position-absolute end-0 my-3" >
                            <a href="./act/create.html" title="Заполнить акт">
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

