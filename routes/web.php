<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosticController;
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
    return view('index');
})->name('index');


Route::get('/diagnostic', [DiagnosticController::class, 'index'])->name('diagnostic');

Route::post('/diagnostic-result', [DiagnosticController::class, 'get_predictions'])->name('prediction');
