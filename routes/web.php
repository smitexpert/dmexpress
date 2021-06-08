<?php

use App\Http\Controllers\Admin\AffiliateController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\MarchentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\DefaultChargeController;
use App\Http\Controllers\Admin\HerosParcelController;
use App\Http\Controllers\Admin\ParcelController;
use App\Http\Controllers\Admin\PaymentInvoiceController;
use App\Http\Controllers\Admin\PickupController;
use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\AreaController as ControllersAreaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarchentPaymentDetailsController;
use App\Http\Controllers\Site\TrackingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/starter', function () {
    return view('backend.blank');
});

Route::get('tracking', [TrackingController::class, 'tracking'])->name('tracking');

Route::post('area/get', [ControllersAreaController::class, 'index'])->name('area.get');

Route::get('admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'attempt'])->name('admin.login.attempt');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('marchents/datatable', [MarchentController::class, 'dataTable'])->name('marchents.datatable');
    Route::post('marchents/{id}/charge', [MarchentController::class, 'updateCharge'])->name('marchents.charge');
    Route::resource('marchents', MarchentController::class);
    Route::resource('paymentdetails', MarchentPaymentDetailsController::class);

    Route::resource('affiliates', AffiliateController::class);
    Route::post('pickups/get', [PickupController::class, 'getPickup'])->name('pickups.get');
    Route::resource('pickups', PickupController::class);
    Route::get('heros/datatable', [HeroController::class, 'dataTable'])->name('heros.datatable');
    Route::resource('heros', HeroController::class);
    Route::get('areas/datatable', [AreaController::class, 'dataTable'])->name('areas.datatable');
    Route::post('areas/get', [AreaController::class, 'getAreas'])->name('areas.get');
    Route::resource('areas', AreaController::class);
    Route::get('zones/areas/datatable', [ZoneController::class, 'areasDataTable'])->name('zones.areas.datatable');
    Route::get('zones/areas/datatable/{id}', [ZoneController::class, 'zoneAreasDataTable'])->name('zones.areas.datatablearea');
    Route::post('zones/areas/assign', [ZoneController::class, 'assign'])->name('zones.areas.assign');
    Route::post('zones/areas/remove', [ZoneController::class, 'remove'])->name('zones.areas.remove');
    Route::resource('zones', ZoneController::class);

    Route::get('parcels/{id}/print', [ParcelController::class, 'print'])->name('parcels.print');
    Route::get('parcels/add', [ParcelController::class, 'add'])->name('parcels.add');
    Route::get('parcels/request', [ParcelController::class, 'request'])->name('parcels.request');

    Route::get('parcels/request/{marchent}/list', [ParcelController::class, 'requestList'])->name('parcels.request.list');
    Route::get('parcels/request/{id}/show', [ParcelController::class, 'requestShow'])->name('parcels.request.show');
    Route::get('parcels/pending', [ParcelController::class, 'pending'])->name('parcels.pending');
    Route::get('parcels/approved', [ParcelController::class, 'approved'])->name('parcels.approved');
    Route::get('parcels/assigned', [HerosParcelController::class, 'index'])->name('parcels.assigned');
    Route::get('parcels/{id}/hero', [HerosParcelController::class, 'hero'])->name('parcels.hero');
    Route::get('parcels/{id}/print-list', [HerosParcelController::class, 'print'])->name('parcels.hero.print');
    Route::resource('parcels', ParcelController::class);
    Route::resource('charges', DefaultChargeController::class);

    Route::get('payment/invoice', [PaymentInvoiceController::class, 'index'])->name('payment.invoice');
    Route::get('payment/paid/invoice', [PaymentInvoiceController::class, 'paidList'])->name('payment.paid.invoice');
    Route::get('payment/{id}/invoice', [PaymentInvoiceController::class, 'show'])->name('payment.invoice.show');
    Route::get('payment/{id}/generate', [PaymentInvoiceController::class, 'generate'])->name('payment.invoice.generate');
    
    Route::get('payment/{id}/paid', [PaymentInvoiceController::class, 'paid'])->name('payment.invoice.paid');
    Route::get('payment/{id}/print', [PaymentInvoiceController::class, 'print'])->name('payment.invoice.print');

    
});