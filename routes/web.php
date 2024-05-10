<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\PDFController;


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
Route::get('/clear', function () {
    Storage::deleteDirectory('public');
    Storage::makeDirectory('public');

    Artisan::call('route:clear');
    Artisan::call('storage:link', [] );
});

Route::get('/symlink_create', function () {
    Artisan::call('storage:link --relative');
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});
Route::get('/linkstorage', function() {
    Artisan::call('storage:link');
    return '<h1>createed storage </h1>';
});

Route::get('/pdf', function () {
    return view('pdf/pdf');
});
Route::get('login', [AuthenController::class, 'login'])->name('login.index');
Route::post('loginUser', [AuthenController::class, 'loginUser'])->name('loginUser.index');

Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('register', [AuthenController::class, 'registration'])->name('register.index');
    Route::post('registerUser', [AuthenController::class, 'registerUser'])->name('registerUser.index');
    Route::get('doc05_pdf/{id}',[PDFController::class,'pdf_doc05'])->name('doc05_pdf.index');
    Route::get('doc02_pdf/{id}',[App\Http\Controllers\PDFController::class,'pdf_doc02'])->name('doc02_pdf.index');
    Route::get('doc01_pdf/{id}',[PDFController::class,'pdf_doc01'])->name('doc01_pdf.index');
    Route::get('sticker/{id}',[PDFController::class,'sticker'])->name('sticker.index');

    Route::get('customer',[AdminController::class,'customer'])->name('customer');
    Route::get('add_customer',[AdminController::class,'add_customer'])->name('add_customer.index');
    Route::post('add_customer_insert',[AdminController::class,'add_customer_insert'])->name('add_customer_insert.index');
    Route::get('order', [AdminController::class, 'order'])->name('order');
    Route::get('doc01', [AdminController::class, 'doc01'])->name('doc01.index');
    Route::get('doc02', [AdminController::class, 'doc02'])->name('doc02.index');
    Route::get('doc05', [AdminController::class, 'doc05'])->name('doc05.index');

    Route::post('order_insert', [AdminController::class, 'order_insert'])->name('order_insert');
    Route::post('order_update', [AdminController::class, 'order_update']);
    Route::post('update_date_doc01', [AdminController::class, 'update_date_doc01'])->name('update_date_doc01');
    Route::post('update_date_doc05', [AdminController::class, 'update_date_doc05'])->name('update_date_doc05.index');

    Route::get('testimg', [AdminController::class, 'testimg'])->name('testimg');

    Route::get('order_edit/{id}', [AdminController::class, 'order_edit'])->name('order_edit.index');
    Route::get('doc01_edit/{id}', [AdminController::class, 'doc01_edit'])->name('doc01_edit.index');  
    Route::get('doc05_edit/{id}', [AdminController::class, 'doc05_edit'])->name('doc05_edit.index');
});
Route::get('logout', [AuthenController::class, 'logout'])->name('logout.index');