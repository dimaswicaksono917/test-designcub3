<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubscriptionController;

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


Route::get('/', [LocationController::class, 'index'])->name('landing');


Route::get('/regencies', [LocationController::class, 'getRegencies'])->name('getRegencies');
Route::get('/districts', [LocationController::class, 'getDistricts'])->name('getDistricts');
Route::get('/villages', [LocationController::class, 'getVillages'])->name('getVillages');
Route::post('/submit-location', [LocationController::class, 'submitLocation'])->name('submitLocation');

Route::get('/subscribe', [SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::delete('subscribe/delete/{id}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');


