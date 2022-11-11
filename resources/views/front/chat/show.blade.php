@extends('front.layouts.main')

@section('title')
    @parent | Чат
@endsection

@section('content')
<main>
<div class="container pt-2" style="height: 90vh;">
        <div class="header-user-info mb-2" style="height: 10vh;">
            <div style="
                 background: rgba( 255, 255, 255, 0.1 );
                   backdrop-filter: blur( 1px );
                   -webkit-backdrop-filter: blur( 1px );
                   border: 1px solid rgba( 255, 255, 255, 0.18 );
                   border-radius: 5px;
                   color: white;" class="d-flex justify-content-between">
                <a href="{{ route('front.chat.index') }}">
                    <img src="{{ asset('icons/back-2.svg') }}" alt="back" width="30" height="35" class="ms-1">
                </a>
                <h5 class="my-auto" style="color: white;">
                    <img alt="Picture" src="{{ asset('icons/snow.svg') }}" width="35" height="35">
                    Европолис ХВО</h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#rightSideMenu" aria-controls="rightSideMenu"
                        aria-expanded="false" aria-label="Toggle navigation">
<!--                    <img src="../icons/dots-menu.svg" alt="Menu picture" width="30" height="30" class="me-3 my-auto">-->
                </button>
            </div>
        </div>

        <div class="body-messages mb-1" id="body-messages" style="height: 60vh;">

            <div class="col-7 message-left-side">
                <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                    <div class="mb-2">
                        <span>Message 1 adsf фыав фыа adsf sdfsd df sd f</span>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-7 d-flex flex-row-reverse m-3  message-right-side">
                    <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                        <div class="mb-2">
                            <span>Течет вода из кондиционера у арендатора Massimo Rene</span>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                    <div class="mb-2">
                        <span>Message 1</span>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-7 d-flex flex-row-reverse m-3">
                    <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                        <div class="mb-2">
                            <span>Message 1 adsf фыd asf asdf as dfasd fasdf asdf</span>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                    <div class="mb-2">
                        <span>Message 1</span>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-7 d-flex flex-row-reverse m-3">
                    <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                        <div class="mb-2">
                            <span>Message 1 adsf фыав sdf  asdfasdf adsf asdf asdf asdf asfd asf asfd asf asdf as dfasd fasdf asdf</span>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                    <div class="mb-2">
                        <span>Message 1 фыва а ва выа ыва</span>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-7 d-flex flex-row-reverse m-3">
                    <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                        <div class="mb-2">
                            <span>Message 1 adsf фыав sdf  asdfasdf adsf asdf asdf asdf asfd asf asfd asf asdf as dfasd fasdf asdf</span>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                    <div class="mb-2">
                        <span>adsf asdf asdf asd fasdf asdf </span>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-7 d-flex flex-row-reverse m-3">
                    <div class="p-2" style="background: rgba( 255, 255, 255, 0.1 );
                        backdrop-filter: blur( 1px );
                        -webkit-backdrop-filter: blur( 1px );
                        border: 1px solid rgba( 255, 255, 255, 0.18 );
                        border-radius: 5px;
                        color: white;
                        display: inline-block;">
                        <div class="mb-2">
                            <a href="{{ asset('dist/img/first.jpg') }}" target="_blank">
                                <img src="{{ asset('dist/img/first.jpg') }}" alt="Problem picture" width="100" height="100">
                            </a>
                            <br>
                            <span>Течет вода из кондиционера у арендатора Massimo Rene</span>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <span style="font-size: 0.7em; color: white;">11-11-2022 10:23</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="input-group footer-messages-input" style="height: 10vh;">
                <span class="input-group-text" id="basic-addon5">
                        <img src="{{ asset('icons/attach.svg') }}" alt="Send message" width="20" height="20">
                    </span>
            <input type="search" class="form-control" placeholder="Введите сообщение"
                   aria-label="Recipient's username" aria-describedby="basic-addon2" autofocus>
            <span class="input-group-text" id="basic-addon2">
                        <img src="{{ asset('icons/send.svg') }}" alt="Send message" width="20" height="20">
                    </span>
        </div>
</div>
    @include('front.components.navbar')
</main>
@endsection
