<?php

use App\Http\Controllers\QueueController;
use App\Http\Middleware\CheckUserMiddleware;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('close/ticket', [QueueController::class, 'close'])->name('close');

Route::POST('add/Text',[QueueController::class,'store'])->name('add.ticket');


Route::prefix('employee/')->middleware(CheckUserMiddleware::class)->group(function () {

    Route::get('show/ticket',[QueueController::class,'index'])->name('show.tickets');
});
