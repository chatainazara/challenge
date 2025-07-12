<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\CsvDownloadController;
use App\Http\Controllers\ContactformController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ThanksController;

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

// Route::get('/welcom', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
});

Route::get('/admin',[AdminController::class, 'search']);
Route::post('/admin',[AdminController::class, 'search']);

Route::get('/csv-download', [CsvDownloadController::class, 'downloadCsv']);
Route::post('/csv-download', [CsvDownloadController::class, 'downloadCsv']);

Route::post('/remove',[AdminController::class, 'remove']);

Route::get('/',[ContactformController::class, 'contactform']);
Route::post('/confirm',[ConfirmController::class, 'confirm']);
Route::post('/thanks',[ThanksController::class, 'thanksOrfix']);
