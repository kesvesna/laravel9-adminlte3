@extends('front.layouts.main')

@section('title')
    @parent Чаты
@endsection

@section('content')
<main>
<div class="container chats-list" style="height: 90vh; padding-bottom: 5vh;">
    <form class="flex-column align-items-center my-auto pt-3">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto mb-4">
            <h4 style="color: white;">Чат заявок</h4>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Академ Парк
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Гудзон
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Европолис (м.Лесная)
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Европолис (м.Ростокино)
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    FORT Отрадное
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Золотой Вавилон
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Лондон Молл
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Порт Находка
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Пятая Авеню
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Пять Озёр
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Родео Драйв
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Сити Молл
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="dropdown-center mb-2">
                <a class="btn btn-outline-light dropdown-toggle col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Фиолент
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/repair.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>СЭ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/snow.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ХВО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/auto.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>АСУ</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/camera.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>ТСО</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/admin.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Администрация</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('front.chat.show') }}">
                            <img src="../icons/cleaning.svg" alt="repair" width="20" height="20" class="mb-1">
                            <span>Клининг</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
    @include('front.components.navbar')
</main>
@endsection
