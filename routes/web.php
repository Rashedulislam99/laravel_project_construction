<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskDetailController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view("pages.erp.dashboard.index");
});


Route::prefix("/system")->group(function () {
    Route::resource('suppliers', SupplierController::class);
});



Route::prefix('/system')->group(function () {
    Route::resource('projects', ProjectController::class);
});

Route::prefix('/system')->group(function () {
    Route::resource('tasks', TaskController::class);
});

Route::prefix('/system')->group(function () {
    Route::resource('employees', EmployeeController::class);
});


Route::prefix('/system')->group(function(){
    Route::resource('task_details',TaskDetailController::class);
});