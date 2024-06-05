<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Service\admin\DataControl\dataApproveController;
use App\Http\Controllers\Service\kepalaKantor\DataControl\dataApproveController as DataControlDataApproveController;
use App\Http\Controllers\Service\pool\DataControl\dataApproveController as PoolDataControlDataApproveController;
use App\Http\Controllers\Service\service\DataControl\dataApproveController as ServiceDataControlDataApproveController;
use App\Http\Controllers\Service\superAdmin\DataControl\approveAsKepalaKantor;
use App\Http\Controllers\Service\superAdmin\DataControl\approveAsPool;
use App\Http\Controllers\Service\superAdmin\DataControl\approveAsService;
use App\Http\Controllers\Service\superAdmin\DataControl\dataApproveController as SuperAdminDataControlDataApproveController;
use App\Http\Controllers\Service\superAdmin\Kendaraan\driverController;
use App\Http\Controllers\Service\superAdmin\Kendaraan\kendaraanController;
use App\Http\Controllers\Service\superAdmin\Pegawai\pegawaiController;
use App\Http\Controllers\Service\superAdmin\User\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dahboard', [DashboardController::class, 'index']); // name('dashboard')
    Route::resource('/data-approve', dataApproveController::class);
    Route::post('/data-approve/selesai/{dataApprove}', [dataApproveController::class, 'selesai']); // name('data-approve.selesai')
});

// Kepala Kantor Routes
Route::prefix('kepalaKantor')->name('kepalaKantor')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); // name('dashboard')
    Route::resource('/data-approve', DataControlDataApproveController::class);
    Route::post('/data-approve/approve/{data_approve}', [DataControlDataApproveController::class, 'approve']); // name('data-approve.approve')
    Route::post('/data-approve/reject/{data_approve}', [DataControlDataApproveController::class, 'reject']); // name('data-approve.reject')
});

// Pool Route
Route::prefix('pool')->name('pool')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); // name('dashboard')
    Route::resource('/data-approve', PoolDataControlDataApproveController::class);
    Route::post('/data-approve/approve/{data_approve}', [PoolDataControlDataApproveController::class, 'approve']); // name('data-approve.approve')
    Route::post('/data-approve/reject/{data_approve}', [PoolDataControlDataApproveController::class, 'reject']); // name('data-approve.reject')
    Route::post('/data-approve/isiBBM/{data_approve}', [PoolDataControlDataApproveController::class, 'isiBbm']); // name('data-approve.isiBbm')
    Route::post('/data-approve/gantiService/{data_approve}', [PoolDataControlDataApproveController::class, 'gantiService']); // name('data-approve.gantiService')
});

// Service
Route::prefix('asService')->name('asService')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); // name('dashboard')
    Route::resource('/service', ServiceDataControlDataApproveController::class);
    Route::post('/isiBBM/{service}', [ServiceDataControlDataApproveController::class, 'isiBbm']); // name('service.isiBbm')
    Route::post('/service/{service}', [ServiceDataControlDataApproveController::class, 'service']); // name('service.service')
});

// superAdmin
Route::prefix('superAdmin')->name('superAdmin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); // name('dashboard')
    Route::resource('/users', userController::class);
    Route::resource('/pegawai', pegawaiController::class);
    Route::resource('/kendaraan', kendaraanController::class);
    Route::resource('/driver', driverController::class);
    Route::resource('/data-approve', SuperAdminDataControlDataApproveController::class);
    Route::get('/exports', [SuperAdminDataControlDataApproveController::class, 'export_excel']); // name('data-approve.export')

    Route::resource('/approveAsPool', approveAsPool::class);
    Route::post('/approveAsPool/approve/{approveAsPool}', [approveAsPool::class, 'approve']); // name('approveAsPool.approve')
    Route::post('/approveAsPool/reject/{approveAsPool}', [approveAsPool::class, 'reject']); // name('approveAsPool.reject')
    Route::post('/approveAsPool/isiBBM/{approveAsPool}', [approveAsPool::class, 'isiBbm']); // name('approveAsPool.isiBbm')
    Route::post('/approveAsPool/gantiService/{approveAsPool}', [approveAsPool::class, 'gantiService']); // name('approveAsPool.gantiService')

    Route::resource('/approveAsKepala', approveAsKepalaKantor::class);
    Route::post('/approveAsKepala/approve/{approveAsKepala}', [approveAsKepalaKantor::class, 'approve']); // name('approveAsKepala.approve')
    Route::post('/approveAsKepala/reject/{approveAsKepala}', [approveAsKepalaKantor::class, 'reject']); // name('approveAsKepala.reject')

    Route::resource('/approveAsService', approveAsService::class);
    Route::post('/approveAsService/isiBBM/{approveAsService}', [approveAsService::class, 'isiBbm']); // name('approveAsService.isiBbm')
    Route::post('/approveAsService/service/{approveAsService}', [approveAsService::class, 'service']); // name('approveAsService.service')
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
