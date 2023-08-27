<?php

use App\Http\Controllers\clientController;
use App\Http\Controllers\homeController;
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

Route::get('/', [homeController::class, 'index'])->name('index');

Route::post('/', [homeController::class, 'mail'])->name('home.mail');

Route::get('/client/query_packs', [clientController::class,'index'])->name('client.query_packs');