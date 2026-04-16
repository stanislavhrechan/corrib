<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\{RoomController, FloorAdminController, ApartmentAdminController, ParkingAdminController};
use App\Http\Controllers\Corrib\{BuildController, FloorController, ApartmentController, Gallery};

Route::get('/password', function () {
    return view('password');
});

Route::post('/password', function (Illuminate\Http\Request $request) {
    if ($request->password === 'BenardJeSuper97') {
        session(['access_granted' => true]);
        return redirect('/');
    }

    return back()->with('error', 'Wrong password');
});

Route::middleware('password.protect')->group(function () {

Route::get('/', function () {
    return view('index');
});

Route::get('/corrib', [BuildController::class, 'index'])->name('corrib.bild');
Route::get('/floor/{floor}', [FloorController::class, 'show'])->name('floor.show');
Route::get('/apartment/{slug}', [ApartmentController::class, 'show'])->name('apartment.show');

Route::get('/gallery_img', [Gallery::class, 'index'])->name('gallery');
Route::get('/gallery_img/filter', [Gallery::class, 'filter'])->name('gallery.filter');

Route::get('/svg/{name}', function ($name) {
    return view("svg.$name");
});


Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login')->middleware('guest');

Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard',[FloorAdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/dashboard/build-park',[ParkingAdminController::class, 'index'])->name('admin.dashboard.build_park');
    Route::post('/admin/build-park/store', [ParkingAdminController::class, 'store_build'])->name('admin.build_park.store');
    Route::get('/admin/buildings/{building}', [ParkingAdminController::class, 'show'])->name('admin.buildings.show');
    Route::post('/admin/parkings', [ParkingAdminController::class, 'store'])->name('admin.parkings.store');

    Route::put('/admin/parkings/{parking}', [ParkingAdminController::class, 'update'])->name('admin.parkings.update');

    Route::get('/admin/floors/{floor}', [FloorAdminController::class, 'show'])->name('admin.floors.show');

    Route::post('/admin/floor/store', [FloorAdminController::class, 'store'])->name('admin.floors.store');

    Route::put('/admin/floor/apartment/{apartment}/update', [ApartmentAdminController::class, 'update'])->name('admin.floors.apartment.update');
   
    Route::post('/admin/floor/apartment/store', [ApartmentAdminController::class, 'store'])->name('admin.floors.apartment.store');

    Route::post('/admin/floor/apartment/room/store', [RoomController::class, 'store'])->name('admin.floors.apartment.room.store');
    Route::put('/admin/floor/apartment/room/{room}/update', [RoomController::class, 'update'])->name('admin.floors.apartment.room.update');
    Route::delete('/admin/floor/apartment/room/{room}/destroy', [RoomController::class, 'destroy'])->name('admin.floors.apartment.room.destroy');
});

});
