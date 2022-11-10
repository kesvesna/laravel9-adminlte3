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

Route::get('/', function () {
    return view('front/index');
});

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
