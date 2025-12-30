<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeesTaskController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatuseController;
use App\Http\Controllers\TaskDetailController;
use App\Http\Controllers\UserController;
use App\Mail\UserNotification;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth'])->group(function () {



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

// Route::prefix('/system')  ->group(function () {
//     Route::resource('employees', EmployeeController::class);
// });

Route::middleware(['auth', 'admin'])->prefix('system')
->group(function () {

        Route::resource('employees', EmployeeController::class);

    });


Route::prefix('/system')->group(function(){
    Route::resource('task_details',TaskDetailController::class);
});


Route::prefix('/system')->group(function(){
    Route::resource('employees_tasks',EmployeesTaskController::class);
});


Route::prefix('/system')->group(function(){
    Route::resource('materials',MaterialController::class);
});


Route::prefix('/system')->group(function(){
    Route::resource('inventorys',InventoryController::class);
});

Route::prefix('/system')->group(function(){
    Route::resource('expenses',ExpenseController::class);
});

Route::prefix('/system')->group(function(){
    Route::resource('roles',RoleController::class);
});

Route::prefix('/system')->group(function(){
    Route::resource('users',UserController::class);
});

Route::prefix('/system')->group(function(){
    Route::resource('statuses',StatuseController::class);
});

// Route::get('/sendmail', function () {
//     Mail::to('carussell507@gmail.com')->send(new UserNotification());
//     return 'Email Sent Successfully';
// });

});


Auth::routes();

Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

