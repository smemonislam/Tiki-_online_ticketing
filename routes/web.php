<?php

use App\Models\SeatAllocation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeatAllocationController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/buses', BusController::class);
Route::resource('/locations', LocationController::class);
Route::resource('/trips', TripController::class);
Route::resource('/seat-allocations', SeatAllocationController::class)->only(['index', 'create', 'store']);
