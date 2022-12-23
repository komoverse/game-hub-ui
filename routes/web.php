<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\AcademyController;

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

Route::get('/', function () {
    return view('user.home');
});
Route::get('komochess', function() {
    return view('user.game-detail');
});
Route::get('telyu-racer', function() {
    return view('user.game-detail-telyu');
});
Route::get('games', function() {
    return view('user.games');
});
Route::get('{game}/items/{id}', function(){
    return view('user.market-listing');
});

Route::get('news', [NewsController::class, 'showNews']);
Route::get('news/{slug}', [NewsController::class, 'showSingleNews']);
Route::get('partnership', [PartnershipController::class, 'showPartner']);
Route::get('partner/{slug}', [PartnershipController::class, 'showSinglePartner']);
Route::get('academy', [AcademyController::class, 'showAcademy']);
Route::get('academy/{slug}', [AcademyController::class, 'showSingleAcademy']);

Route::get('admin/login', [AuthController::class, 'showAdminLoginPage']);
Route::post('admin/login', [AuthController::class, 'loginAdmin']);

Route::prefix('admin')->middleware('admin.auth')->group(function(){
    Route::get('/', [DashboardController::class, 'showDashboard']);
    Route::get('dashboard', [DashboardController::class, 'showDashboard']);

    Route::prefix('news')->group(function(){
        Route::get('list', [NewsController::class, 'adminShowNews']);
        Route::get('list/{lang}', [NewsController::class, 'adminShowNewsSingleLang']);
        Route::get('create', [NewsController::class, 'showAddNewsForm']);
        Route::post('create', [NewsController::class, 'submitNews']);
    });
});