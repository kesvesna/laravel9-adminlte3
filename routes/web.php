<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// backend
use App\Http\Controllers\Admin\Applications\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\Applications\ApplicationStatusController as AdminApplicationStatusController;
use App\Http\Controllers\Admin\Towns\TownController as AdminTownController;
use App\Http\Controllers\Admin\Trks\TrkController as AdminTrkController;
use App\Http\Controllers\Admin\Buildings\BuildingController as AdminBuildingController;
use App\Http\Controllers\Admin\BuildingsTrks\BuildingTrkController as AdminBuildingTrkController;
use App\Http\Controllers\Admin\Floors\FloorController as AdminFloorController;
use App\Http\Controllers\Admin\Rooms\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\Profiles\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\Repairs\RepairController as AdminRepairController;
use App\Http\Controllers\Admin\Systems\SystemController as AdminSystemController;
use App\Http\Controllers\Admin\Equipments\EquipmentController as AdminEquipmentController;


//frontend
use App\Http\Controllers\Front\IndexController as FrontIndexController;
use App\Http\Controllers\Front\Chats\ChatController as FrontChatController;
use App\Http\Controllers\Front\Applications\ApplicationController as FrontApplicationController;
use App\Http\Controllers\Front\Repairs\RepairController as FrontRepairController;
use App\Http\Controllers\Front\Acts\ActController as FrontActController;
use App\Http\Controllers\Front\RenterApplications\RenterApplicationController as FrontRenterApplicationController;
use App\Http\Controllers\Front\Equipments\EquipmentController as FrontEquipmentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applications. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home page
Route::get('/', [FrontIndexController::class, 'index'])->name('front.index');

Route::get('front/chat/', [FrontChatController::class, 'index'])->name('front.chat.index');
Route::get('front/chat/show', [FrontChatController::class, 'show'])->name('front.chat.show');

Route::name('front.')
    ->prefix('front')
    ->group(function () {
        Route::resource('applications', FrontApplicationController::class);
        Route::post('applications/accept/{application}', [FrontApplicationController::class, 'accept'])->where('application', '[0-9]+')->name('applications.accept');
        Route::post('applications/redirect/{application}', [FrontApplicationController::class, 'redirect'])->where('application', '[0-9]+')->name('applications.redirect');
        Route::post('applications/reject/{application}', [FrontApplicationController::class, 'reject'])->where('application', '[0-9]+')->name('applications.reject');
        Route::post('applications/appoint/{application}', [FrontApplicationController::class, 'appoint'])->where('application', '[0-9]+')->name('applications.appoint');

        Route::resource('repair', FrontRepairController::class);
        Route::post('repair/create_by_application/{application}', [FrontRepairController::class, 'create_by_application'])->where('application', '[0-9]+')->name('repair.create_by_application');
        Route::post('repair/appoint/{repair}', [FrontRepairController::class, 'appoint'])->where('repair', '[0-9]+')->name('repair.appoint');
        Route::post('repair/reject/{repair}', [FrontRepairController::class, 'reject'])->where('repair', '[0-9]+')->name('repair.reject');

        Route::resource('equipment', FrontEquipmentController::class);

    });


Route::get('front/act/', [FrontActController::class, 'index'])->name('front.act.index');
Route::get('front/act/show', [FrontActController::class, 'show'])->name('front.act.show');
Route::get('front/act/create', [FrontActController::class, 'create'])->name('front.act.create');
Route::post('front/act/create_by_repair_all_done/{repair}', [FrontActController::class, 'create_by_repair_all_done'])->name('front.act.create_by_repair_all_done');
Route::post('front/act/create_by_repair_not_completely_done/{repair}', [FrontActController::class, 'create_by_repair_not_completely_done'])->name('front.act.create_by_repair_not_completely_done');
Route::post('front/act/create_by_application_all_done/{application}', [FrontActController::class, 'create_by_application_all_done'])->name('front.act.create_by_application_all_done');
Route::post('front/act/create_by_application_not_completely_done/{application}', [FrontActController::class, 'create_by_application_not_completely_done'])->name('front.act.create_by_application_not_completely_done');

Route::get('front/renter_application/', [FrontRenterApplicationController::class, 'index'])->name('front.renter_application.index');
Route::get('front/renter_application/show', [FrontRenterApplicationController::class, 'show'])->name('front.renter_application.show');
Route::get('front/renter_application/create', [FrontRenterApplicationController::class, 'create'])->name('front.renter_application.create');



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
        Route::resource('repairs', AdminRepairController::class);
        Route::resource('application_statuses', AdminApplicationStatusController::class);


        Route::get('profiles/timesheet/', [AdminProfileController::class, 'timesheet'])->name('profiles.timesheet');

        Route::post('buildings-trks/{trk}', [AdminBuildingTrkController::class, 'update'])->name('buildings-trks.update');

        Route::resource('systems', AdminSystemController::class);

        Route::resource('equipments', AdminEquipmentController::class);
    });
