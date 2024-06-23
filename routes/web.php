<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
  return view('landing-page');
});

Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [AuthController::class, 'reqister'])->name('register');
  Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/keloladata', [KepegawaianController::class, 'index'])->name('keloladata');

// Route::get('/crud', function () {
//     return view('index');
// });

// Backend Routes
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });

// CRUD
Route::get('tambah-data', [KepegawaianController::class, 'index']);
Route::post('store', [KepegawaianController::class, 'store']);
Route::post('edit', [KepegawaianController::class, 'edit']);
Route::post('delete', [KepegawaianController::class, 'destroy']);
Route::post('detail', [KepegawaianController::class, 'detail']);


// Route::get('ajax-crud-datatable', [EmployeeController::class, 'index']);
// Route::post('store', [EmployeeController::class, 'store']);
// Route::post('edit', [EmployeeController::class, 'edit']);
// Route::post('delete', [EmployeeController::class, 'destroy']);
