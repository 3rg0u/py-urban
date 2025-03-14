<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\ResidentAccountController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });


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
        });
    });
});





Route::prefix('/resident')->group(function () {
    Route::get('/', function () {
        return view('resident.dashboard');
    })->name('resident.dashboard');
});