<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationVisitController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdminAuthController;
use App\Http\Controllers\SuperAdminApplicationController;


// =====================================================
// PORTAL APLIKASI
// =====================================================

Route::get(
    '/',
    [ApplicationController::class, 'index']
)->name('applications.index');


// =====================================================
// BUKA APLIKASI + CATAT KUNJUNGAN
// =====================================================

Route::get(
    '/applications/{application}/open',
    [ApplicationVisitController::class, 'open']
)->name('applications.open');


// =====================================================
// SUPER ADMIN
// =====================================================

Route::get(
    '/superadmin',
    [SuperAdminAuthController::class, 'showLogin']
)->name('superadmin.login');

Route::post(
    '/superadmin/login',
    [SuperAdminAuthController::class, 'login']
)->name('superadmin.login.submit');

Route::post(
    '/superadmin/logout',
    [SuperAdminAuthController::class, 'logout']
)->name('superadmin.logout');


Route::get(
    '/superadmin/dashboard',
    [SuperAdminController::class, 'dashboard']
)->name('superadmin.dashboard');


Route::get(
    '/superadmin/applications',
    [SuperAdminApplicationController::class, 'index']
)->name('superadmin.applications.index');

Route::get(
    '/superadmin/applications/create',
    [SuperAdminApplicationController::class, 'create']
)->name('superadmin.applications.create');

Route::post(
    '/superadmin/applications',
    [SuperAdminApplicationController::class, 'store']
)->name('superadmin.applications.store');

Route::get(
    '/superadmin/applications/{application}/edit',
    [SuperAdminApplicationController::class, 'edit']
)->name('superadmin.applications.edit');

Route::put(
    '/superadmin/applications/{application}',
    [SuperAdminApplicationController::class, 'update']
)->name('superadmin.applications.update');

Route::delete(
    '/superadmin/applications/{application}',
    [SuperAdminApplicationController::class, 'destroy']
)->name('superadmin.applications.destroy');
