<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Public route – displays student list
Route::get('/students-view', [StudentController::class, 'index']);

// Admin routes (all prefixed with 'admin')
Route::prefix('admin')->group(function () {
    // Admin dashboard (simple)
    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    });

    // Admin student list
    Route::get('/students', [StudentController::class, 'adminIndex']);

    // Update and delete – method spoofing used in forms
    Route::put('/student/{id}', [StudentController::class, 'update']);
    Route::delete('/student/{id}', [StudentController::class, 'destroy']);
});

// Optional landing page
Route::get('/', function () {
    return "Welcome to Student System";
});