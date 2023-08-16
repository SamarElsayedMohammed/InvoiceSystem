<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        //--------------------sections routes----------------------------
        Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
        Route::Post('/sections/store', [SectionController::class, 'store'])->name('sections.store');
        Route::Post('/sections/update', [SectionController::class, 'update'])->name('sections.update');
        Route::Post('/sections/delete', [SectionController::class, 'destroy'])->name('sections.delete');
    });

    Route::resource('invoices', InvoicesController::class);
    require __DIR__ . '/auth.php';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
