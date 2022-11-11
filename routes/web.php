<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Applications\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\Towns\TownController as AdminTownController;
use App\Http\Controllers\Admin\Trks\TrkController as AdminTrkController;
use App\Http\Controllers\Admin\Buildings\BuildingController as AdminBuildingController;
use App\Http\Controllers\Admin\BuildingsTrks\BuildingTrkController as AdminBuildingTrkController;
use App\Http\Controllers\Admin\Floors\FloorController as AdminFloorController;
use App\Http\Controllers\Admin\Rooms\RoomController as AdminRoomController;

use App\Http\Controllers\Front\IndexController as FrontIndexController;
use App\Http\Controllers\Front\Chats\ChatController as FrontChatController;
use App\Http\Controllers\Front\Applications\ApplicationController as FrontApplicationController;
use App\Http\Controllers\Front\Repairs\RepairController as FrontRepairController;
use App\Http\Controllers\Front\Acts\ActController as FrontActController;
use App\Http\Controllers\Front\RenterApplications\RenterApplicationController as FrontRenterApplicationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home page
Route::get('/', [FrontIndexController::class, 'index'])->name('front.index');
Route::get('/index', [FrontIndexController::class, 'index'])->name('front.index');
Route::get('/home', [FrontIndexController::class, 'index'])->name('front.index');

Route::get('front/chat/', [FrontChatController::class, 'index'])->name('front.chat.index');
Route::get('front/application/', [FrontApplicationController::class, 'index'])->name('front.application.index');
Route::get('front/repair/', [FrontRepairController::class, 'index'])->name('front.repair.index');
Route::get('front/act/', [FrontActController::class, 'index'])->name('front.act.index');
Route::get('front/renter_application/', [FrontRenterApplicationController::class, 'index'])->name('front.renter_application.index');


Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('applications', AdminApplicationController::class);
        Route::resource('towns', AdminTownController::class);
        Route::resource('trks', AdminTrkController::class);
        Route::get('/trks/get/{town}', [AdminTrkController::class, 'getTrksByTown'])->name('trks.get');
        Route::resource('buildings', AdminBuildingController::class);
        Route::resource('floors', AdminFloorController::class);
        Route::resource('rooms', AdminRoomController::class);

        Route::post('buildings-trks/{trk}', [AdminBuildingTrkController::class, 'update'])->name('buildings-trks.update');
    });
