<?php

use App\Models\InvoicesDetails;
use App\Http\Livewire\GetProducts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoiceFilesController;
use App\Http\Controllers\InvoiceReportsController;
use App\Http\Controllers\InvoicesDetailsController;

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
Route::get('get-products', GetProducts::class)->name('livewire.sections');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
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

        //--------------------Products routes----------------------------
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::Post('/products/store', [ProductController::class, 'store'])->name('products.store');
        Route::Post('/products/update', [ProductController::class, 'update'])->name('products.update');
        Route::Post('/products/delete', [ProductController::class, 'destroy'])->name('products.delete');
        //--------------------invoices routes----------------------------
        Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.index');
        Route::get('/invoices/export', [InvoicesController::class, 'export'])->name('invoices.export');
        Route::get('/invoices/archived-invoice', [InvoicesController::class, 'ArchivedInvoice'])->name('invoices.archived.invoice');
        Route::get('/invoices/create', [InvoicesController::class, 'create'])->name('invoices.create');
        Route::Post('/invoices/store', [InvoicesController::class, 'store'])->name('invoices.store');
        Route::get('/invoices/show/{id}', [InvoicesController::class, 'show'])->name('invoices.show');
        Route::get('/invoices/print-invoice/{id}', [InvoicesDetailsController::class, 'PrintInvoice'])->name('invoices.Print');
        Route::get('/invoices/status/{status}', [InvoicesController::class, 'SatatusInvoice'])->name('invoices.status');
        Route::get('/invoices/edit/{id}', [InvoicesController::class, 'edit'])->name('invoices.edit');
        Route::get('/invoices/restore/{id}', [InvoicesController::class, 'RestoreInvoice'])->name('invoices.restore');
        Route::get('/invoices/delete-forever/{id}', [InvoicesController::class, 'DeleteForeverInvoice'])->name('invoices.deleteForever.Invoice');
        Route::get('/invoices/delete/{id}', [InvoicesController::class, 'destroy'])->name('invoices.destroy');
        Route::post('/invoices/update', [InvoicesController::class, 'update'])->name('invoices.update');
        Route::post('/invoices/archive-all', [InvoicesController::class, 'ArchiveAll'])->name('invoices.Archive.All');
        Route::get("/show-actions", [InvoicesController::class, "ShowDeletedActions"])->name("invoices.ShowDeletedActions");
        // ----------------------------invoic details route------------------------
        Route::get('/invoices/details/{id}', [InvoicesDetailsController::class, "index"])->name("invoices.deatails");
        Route::get('/invoices/sections/{section_id}', [InvoicesDetailsController::class, "SectionInvoices"])->name("invoices.Section.Invoices");
        Route::get('/invoices/mark-all-readed', [InvoicesDetailsController::class, "MarkAllReaded"])->name("invoices.MarkAllReaded");

        Route::post("/invoice/file/show", [InvoiceFilesController::class, "show"])->name("invoice.file.show");
        Route::post("/invoice/file/download", [InvoiceFilesController::class, "downloadFile"])->name("invoice.file.download");
        Route::post("/invoice/file/delete", [InvoiceFilesController::class, "DeleteFile"])->name("invoice.file.delete");
        Route::post("/invoice/file/upload-image", [InvoiceFilesController::class, "UploadImage"])->name("invoice.file.uplode");

        // ---------------------------user routes-------------------------
        Route::get('/users', [UserController::class, "index"])->name("users.index");
        Route::get('/users/create', [UserController::class, "create"])->name("users.create");
        Route::get('/users/edit/{id}', [UserController::class, "edit"])->name("users.edit");
        Route::get('/users/delete/{id}', [UserController::class, "delete"])->name("users.delete");
        Route::post('/users/store', [UserController::class, "store"])->name("users.store");
        Route::post('/users/update', [UserController::class, "update"])->name("users.update");
        // ---------------------------roles routes-------------------------
        Route::get('/roles', [RoleController::class, "index"])->name("roles.index");
        Route::get('/roles/create', [RoleController::class, "create"])->name("roles.create");
        Route::get('/roles/edit/{id}', [RoleController::class, "edit"])->name("roles.edit");
        Route::get('/roles/delete/{id}', [RoleController::class, "destroy"])->name("roles.delete");
        Route::post('/roles/store', [RoleController::class, "store"])->name("roles.store");
        Route::post('/roles/update/{id}', [RoleController::class, "update"])->name("roles.update");
        // ---------------------------invoices reports routes-------------------------
        Route::get('/invoice-report', [InvoiceReportsController::class, "index"])->name("invoices.reports.index");
        Route::get('/invoice-filter', [InvoiceReportsController::class, "DateFilter"])->name("invoices.reports.filter");
        Route::get('/invoice-filter-invoice-number', [InvoiceReportsController::class, "DateFilterByInvoiceNumber"])->name("invoices.reports.Filter.By.Invoice.Number");
        Route::get('/invoice-filter-invoice-status', [InvoiceReportsController::class, "DateFilterByInvoiceStatus"])->name("invoices.reports.Filter.By.Invoice.Status");
    });

    // Route::resource('invoices', InvoicesController::class);
    require __DIR__ . '/auth.php';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
