<?php

use App\Http\Controllers\Admin\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class, ['middleware' => ['can:admin.users.edit']])->names('admin.users');
Route::resource('employees', EmployeeController::class)->names('admin.employees');
Route::resource('companies', CompanyController::class)->names('admin.companies');
Route::resource('roles', RoleController::class)->names('admin.roles');

Route::get('help_desk', [ReportController::class, 'index'])->name('admin.help_desk');
Route::get('sales', [ReportController::class, 'sales'])->name('admin.sales');
Route::get('inventory', [ReportController::class, 'inventory'])->name('admin.inventory');
