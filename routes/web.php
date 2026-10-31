<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lecturer;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student;
use Illuminate\Support\Facades\Route;

// Public
Route::get('/', [HomeController::class, 'index'])->name('index');

// Guests only 
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
});

// Any signed-in user 
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

//  Administrator
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->middleware('permission:view dashboard')->name('dashboard');

    Route::resource('students', Admin\StudentController::class)->middleware('permission:manage students');
    Route::resource('courses', Admin\CourseController::class)->middleware('permission:manage courses');
    Route::resource('registrations', Admin\RegistrationController::class)
        ->only(['index', 'create', 'store', 'destroy'])
        ->middleware('permission:manage registrations');
    Route::resource('users', Admin\UserController::class)->except('show')->middleware('permission:manage users');
});

// Lecturer
Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'lecturer'])->middleware('permission:view dashboard')->name('dashboard');
    Route::get('/courses', [Lecturer\CourseController::class, 'index'])->middleware('permission:view assigned courses')->name('courses.index');
    Route::get('/courses/{course}', [Lecturer\CourseController::class, 'show'])->middleware('permission:view course students')->name('courses.show');
});

//  Student 
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'student'])->middleware('permission:view dashboard')->name('dashboard');
    Route::get('/courses', [Student\CourseController::class, 'index'])->middleware('permission:view courses')->name('courses.index');
    Route::get('/registrations', [Student\RegistrationController::class, 'index'])->middleware('permission:view own registrations')->name('registrations.index');
    Route::get('/registrations/create', [Student\RegistrationController::class, 'create'])->middleware('permission:register course')->name('registrations.create');
    Route::post('/registrations', [Student\RegistrationController::class, 'store'])->middleware('permission:register course')->name('registrations.store');
});
