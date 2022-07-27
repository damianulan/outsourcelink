<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;

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
// Pages
Route::resource('/', DashboardController::class);

// Resources
Route::resource('/candidates', CandidatesController::class);
Route::resource('/partners', PartnersController::class);

Route::resource('/employees', EmployeesController::class);


Route::resource('/tasks', TasksController::class);
Route::resource('/users', UserController::class);

// Authentication Pages
Route::get('/auth/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/auth/logging', [AuthController::class, 'login'])->name('auth.logging');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/registration', [AuthController::class, 'registration'])->name('auth.registration');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/auth/companyswitch/{id}', [AuthController::class, 'companySwitch'])->name('auth.companySwitch');

Route::get('/candidates/dataview', [CandidatesController::class, 'requestViews'])->name('candidates.requestViews');
Route::get('/employees/dataview', [EmployeesController::class, 'requestViews'])->name('employees.requestViews');


Route::get('/systemsettings/general', [PagesController::class, 'sysSettings'])->name('sysSettings.index');