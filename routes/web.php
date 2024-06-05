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

// Auth::routes();
// Admin
Route::get('/admin/dahboard', [DashboardController::class, 'index']); // name('dashboard')
Route::resource('/admin/data-approve', dataApproveController::class);
Route::post('/admin/data-approve/selesai/{dataApprove}', [dataApproveController::class, 'selesai']); // name('data-approve.selesai')

// Kepala Kantor
Route::get('/kepalaKantor/dashboard', [DashboardController::class, 'index']); // name('dashboard')
Route::resource('/kepalaKantor/data-approve', DataControlDataApproveController::class);
Route::post('/kepalaKantor/data-approve/approve/{data_approve}', [DataControlDataApproveController::class, 'approve']); // name('data-approve.approve')
Route::post('/kepalaKantor/data-approve/reject/{data_approve}', [DataControlDataApproveController::class, 'reject']); // name('data-approve.reject')

// Pool
Route::get('/pool/dashboard', [DashboardController::class, 'index']); // name('dashboard')
Route::resource('/pool/data-approve', PoolDataControlDataApproveController::class);
Route::post('/pool/data-approve/approve/{data_approve}', [PoolDataControlDataApproveController::class, 'approve']); // name('data-approve.approve')
Route::post('/pool/data-approve/reject/{data_approve}', [PoolDataControlDataApproveController::class, 'reject']); // name('data-approve.reject')
Route::post('/pool/data-approve/isiBBM/{data_approve}', [PoolDataControlDataApproveController::class, 'isiBbm']); // name('data-approve.isiBbm')
Route::post('/pool/data-approve/gantiService/{data_approve}', [PoolDataControlDataApproveController::class, 'gantiService']); // name('data-approve.gantiService')

// Service
Route::get('/service/dashboard', [DashboardController::class, 'index']); // name('dashboard')
Route::resource('/service', ServiceDataControlDataApproveController::class);
Route::post('/service/isiBBM/{service}', [ServiceDataControlDataApproveController::class, 'isiBbm']); // name('service.isiBbm')
Route::post('/service/service/{service}', [ServiceDataControlDataApproveController::class, 'service']); // name('service.service')

// superAdmin
Route::get('/superAdmin/dashboard', [DashboardController::class, 'index']); // name('dashboard')
Route::resource('/superAdmin/users', userController::class);
Route::resource('/superAdmin/pegawai', pegawaiController::class);
Route::resource('/superAdmin/kendaraan', kendaraanController::class);
Route::resource('/superAdmin/driver', driverController::class);
Route::resource('/superAdmin/data-approve', SuperAdminDataControlDataApproveController::class);
Route::get('/exports', [SuperAdminDataControlDataApproveController::class, 'export_excel']); // name('data-approve.export')
Route::resource('/superAdmin/approveAsPool', approveAsPool::class);
Route::post('/superAdmin/approveAsPool/approve/{approveAsPool}', [approveAsPool::class, 'approve']); // name('approveAsPool.approve')
Route::post('/superAdmin/approveAsPool/reject/{approveAsPool}', [approveAsPool::class, 'reject']); // name('approveAsPool.reject')
Route::post('/superAdmin/approveAsPool/isiBBM/{approveAsPool}', [approveAsPool::class, 'isiBbm']); // name('approveAsPool.isiBbm')
Route::post('/superAdmin/approveAsPool/gantiService/{approveAsPool}', [approveAsPool::class, 'gantiService']); // name('approveAsPool.gantiService')
Route::resource('/superAdmin/approveAsKepala', approveAsKepalaKantor::class);
Route::post('/superAdmin/approveAsKepala/approve/{approveAsKepala}', [approveAsKepalaKantor::class, 'approve']); // name('approveAsKepala.approve')
Route::post('/superAdmin/approveAsKepala/reject/{approveAsKepala}', [approveAsKepalaKantor::class, 'reject']); // name('approveAsKepala.reject')
Route::resource('/superAdmin/approveAsService', approveAsService::class);
Route::post('/superAdmin/approveAsService/isiBBM/{approveAsService}', [approveAsService::class, 'isiBbm']); // name('approveAsService.isiBbm')
Route::post('/superAdmin/approveAsService/service/{approveAsService}', [approveAsService::class, 'service']); // name('approveAsService.service')

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
