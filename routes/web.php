<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BreRuleController;
use App\Http\Controllers\Api\LeadApiController;




Route::get('/admin/bre-rules', [BreRuleController::class, 'index'])->name('bre.index');
Route::get('/admin/bre-rules/create', [BreRuleController::class, 'create'])->name('bre.create');
Route::post('/admin/bre-rules/store', [BreRuleController::class, 'store'])->name('bre.store');
Route::get('/admin/bre-rules/{id}/edit', [BreRuleController::class, 'edit'])->name('bre.edit');
Route::post('/admin/bre-rules/{id}/update', [BreRuleController::class, 'update'])->name('bre.update');
Route::get('/admin/bre-rules/{id}/delete', [BreRuleController::class, 'delete'])->name('bre.delete');









Route::get('/admin/leads/{id}/edit', [AdminController::class, 'edit'])->name('admin.leads.edit');

Route::post('/admin/leads/{id}/update', [AdminController::class, 'update'])->name('admin.leads.update');

Route::get('/admin/leads/{id}/delete', [AdminController::class, 'delete'])->name('admin.leads.delete');






Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/leads/{id}', [AdminController::class, 'show'])->name('admin.leads.show');
Route::get('/admin/leads', [AdminController::class, 'leads'])->name('admin.leads');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/', [LeadController::class, 'create'])->name('loan.form');
Route::post('/loan/apply', [LeadController::class, 'store'])->name('loan.store');