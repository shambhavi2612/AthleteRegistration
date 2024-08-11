<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\SuperAdminMiddleware;

use App\Http\Controllers\CentreAdminController;


Route::get('/', function () {
    return view('welcome');
});

// Athlete routes
Route::get('/register', [AthleteController::class, 'showForm']);
Route::post('/register', [AthleteController::class, 'store']);
Route::get('/athlete/profile/{id}', [AthleteController::class, 'showProfile'])->name('athlete.profile');
Route::put('/athlete/profile/{id}', [AthleteController::class, 'update'])->name('athlete.update');

// Super Admin routes
Route::get('superadmin/login', [SuperAdminController::class, 'showLoginForm'])->name('superadmin.login');
Route::post('superadmin/login', [SuperAdminController::class, 'login'])->name('superadmin.login.post');
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');

    


// User registration and login routes
Route::get('userregister', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('userregister', [UserController::class, 'register']);
Route::get('userlogin', [UserController::class, 'showLoginForm'])->name('login');
Route::post('userlogin', [UserController::class, 'login']);
Route::post('userlogout', [UserController::class, 'logout'])->name('logout');

// center-admins
Route::resource('center_admins', CentreAdminController::class);
Route::get('center_admins/{center_admin}/edit', [CentreAdminController::class, 'edit'])->name('center_admins.edit');
Route::get('centre-admin/login', [CentreAdminController::class, 'showLoginForm'])->name('centre_admins.login_form');
Route::post('centre-admin/login', [CentreAdminController::class, 'login'])->name('centre_admins.login');
Route::get('center-admins/dashboard', [CentreAdminController::class, 'dashboard'])->name('centre_admins.dashboard');
Route::post('centre-admin/logout', [CentreAdminController::class, 'logout'])->name('centre_admins.logout');




