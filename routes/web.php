<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\ResidentAccountController;
use App\Http\Controllers\admin\ResidentInforController;
use App\Http\Controllers\admin\ServicePernamentController;
use App\Http\Controllers\admin\ServiceSubscriptionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});








Route::middleware(['auth', 'admin.assert'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');


        Route::prefix('/services')->group(function () {

            Route::get('/', function () {
                return redirect()->route('services.pernament.index');
            });

            Route::prefix('/pernament')->group(function () {
                Route::get('/', [ServicePernamentController::class, 'index'])->name('services.pernament.index');
                Route::post('/add', [ServicePernamentController::class, 'store'])->name('services.pernament.add');
                Route::put('/edit/{id}', [ServicePernamentController::class, 'update'])->name('services.pernament.edit');
                Route::delete('/delete/{id}', [ServicePernamentController::class, 'destroy'])->name('services.pernament.delete');
            });

            Route::prefix('/subscription')->group(function () {
                Route::get('/', [ServiceSubscriptionController::class, 'index'])->name('services.subscription.index');
                Route::post('/add', [ServiceSubscriptionController::class, 'store'])->name('services.subscription.add');
                Route::put('/edit/{id}', [ServiceSubscriptionController::class, 'update'])->name('services.subscription.edit');
                Route::delete('/delete/{id}', [ServiceSubscriptionController::class, 'destroy'])->name('services.subscription.delete');
            });
        });

        Route::prefix('/residents')->group(function () {
            Route::get('/', function () {
                return redirect()->route('residents.account.index');
            });

            Route::prefix('/account')->group(function () {
                Route::get('/', [ResidentAccountController::class, 'index'])->name('residents.account.index');
                Route::get('/create', [ResidentAccountController::class, 'create'])->name('residents.account.create');
                Route::post('/create', [ResidentAccountController::class, 'store'])->name('residents.account.create');

                Route::get('/edit/{id}', [ResidentAccountController::class, 'edit'])->name('residents.account.edit');
                Route::put('/edit/{id}', [ResidentAccountController::class, 'updateInfor'])->name('residents.account.edit');


                Route::put('/edit/pw/{id}', [ResidentAccountController::class, 'updatePassword'])->name('residents.account.editpw');
                Route::delete('/delete/{id}', [ResidentAccountController::class, 'destroy'])->name('residents.account.delete');
            });

            Route::prefix('/information')->group(function () {
                Route::get('/', [ResidentInforController::class, 'index'])->name('residents.infor.index');
                Route::get('/create', [ResidentInforController::class, 'create'])->name('residents.infor.create');
                Route::post('/create', [ResidentInforController::class, 'store'])->name('residents.infor.create');
                Route::get('/show/{id}', [ResidentInforController::class, 'show'])->name('residents.infor.list');
                Route::put('/edit/{id}', [ResidentInforController::class, 'update'])->name('residents.infor.edit');
                Route::delete('/delete/{id}', [ResidentInforController::class, 'destroy'])->name('residents.infor.delete');
            });
        });
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::prefix('/resident')->group(function () {
    Route::get('/', function () {
        return view('resident.dashboard');
    })->name('resident.dashboard');
});


