<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\AcademyController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TournamentController;

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
Route::get('telyu-racer', function() {
    return view('user.game-detail-telyu');
});
Route::get('games', [GameController::class, 'showGameList']);
Route::get('{game}/items/{id}', function(){
    return view('user.market-listing');
});

Route::get('{game_id}', [GameController::class, 'showGameOverview']);
Route::get('{game_id}/overview', [GameController::class, 'showGameOverview']);
Route::get('{game_id}/play-now', [GameController::class, 'showPlayNow']);
Route::get('{game_id}/tournament', [TournamentController::class, 'showTournament']);

Route::get('news', [NewsController::class, 'showNews']);
Route::get('news/{slug}', [NewsController::class, 'showSingleNews']);
Route::get('partnership', [PartnershipController::class, 'showPartner']);
Route::get('partner/{slug}', [PartnershipController::class, 'showSinglePartner']);
Route::get('academy', [AcademyController::class, 'showAcademy']);
Route::get('academy/{slug}', [AcademyController::class, 'showSingleAcademy']);

// =====================
// ADMINISTRATOR ROUTES
// =====================
Route::get('admin/login', [AuthController::class, 'showAdminLoginPage']);
Route::post('admin/login', [AuthController::class, 'loginAdmin']);
Route::get('admin/logout', [AuthController::class, 'logoutAdmin']);

Route::prefix('admin')->middleware('admin.auth')->group(function(){
    Route::get('/', [DashboardController::class, 'showDashboard']);
    Route::get('dashboard', [DashboardController::class, 'showDashboard']);
    Route::get('system-log', [DashboardController::class, 'showSystemLog']);

    Route::get('media', [MediaController::class, 'showMedia']);
    Route::post('media/upload', [MediaController::class, 'saveMedia']);

    Route::prefix('news')->group(function(){
        Route::get('list', [NewsController::class, 'adminShowNews']);
        Route::get('list/{lang}', [NewsController::class, 'adminShowNewsSingleLang']);
        Route::get('create', [NewsController::class, 'showAddNewsForm']);
        Route::post('create', [NewsController::class, 'submitNews']);
        Route::get('delete/{lang}/{id}', [NewsController::class, 'deleteNews']);
        Route::get('pin/{lang}/{id}', [NewsController::class, 'pinNews']);
        Route::get('unpin/{lang}/{id}', [NewsController::class, 'unpinNews']);
        Route::get('right-pin/{lang}/{id}', [NewsController::class, 'pinRightNews']);
        Route::get('right-unpin/{lang}/{id}', [NewsController::class, 'unpinRightNews']);
        Route::get('edit/{lang}/{id}', [NewsController::class, 'showEditNews']);
        Route::post('edit/{lang}/{id}', [NewsController::class, 'updateNews']);
    });

    Route::prefix('partner')->group(function(){
        Route::get('list', [PartnershipController::class, 'adminShowPartners']);
        Route::get('list/{lang}', [PartnershipController::class, 'adminShowPartnersSingleLang']);
        Route::get('create', [PartnershipController::class, 'showAddPartnerForm']);
        Route::post('create', [PartnershipController::class, 'submitPartner']);
        Route::get('delete/{lang}/{id}', [PartnershipController::class, 'deletePartner']);
        Route::get('pin/{lang}/{id}', [PartnershipController::class, 'pinPartner']);
        Route::get('unpin/{lang}/{id}', [PartnershipController::class, 'unpinPartner']);
        Route::get('edit/{lang}/{id}', [PartnershipController::class, 'showEditPartner']);
        Route::post('edit/{lang}/{id}', [PartnershipController::class, 'updatePartner']);
    });

    Route::prefix('academy')->group(function(){
        Route::get('list', [AcademyController::class, 'adminShowAcademy']);
        Route::get('list/{lang}', [AcademyController::class, 'adminShowAcademySingleLang']);
        Route::get('create', [AcademyController::class, 'showAddAcademyForm']);
        Route::post('create', [AcademyController::class, 'submitAcademy']);
        Route::get('delete/{lang}/{id}', [AcademyController::class, 'deleteAcademy']);
        Route::get('pin/{lang}/{id}', [AcademyController::class, 'pinAcademy']);
        Route::get('unpin/{lang}/{id}', [AcademyController::class, 'unpinAcademy']);
        Route::get('edit/{lang}/{id}', [AcademyController::class, 'showEditAcademy']);
        Route::post('edit/{lang}/{id}', [AcademyController::class, 'updateAcademy']);
    });

    Route::prefix('manage')->group(function(){
        Route::get('password', [AuthController::class, 'showAdminChangePassword']);
        Route::post('password', [AuthController::class, 'submitAdminChangePassword']);
        Route::get('admin', [AccountController::class, 'showAdminList']);
    });

    Route::prefix('game')->group(function(){
        Route::get('list', [GameController::class, 'adminShowGameList']);
        Route::get('create', [GameController::class, 'createGameForm']);
        Route::post('create', [GameController::class, 'createGameSubmit']);
        Route::get('tournament', [TournamentController::class, 'adminShowTournament']);
        Route::get('tournament/create', [TournamentController::class, 'createTournamentForm']);
        Route::post('tournament/create', [TournamentController::class, 'createTournamentSubmit']);
        Route::post('links/add', [GameController::class, 'submitLinks']);
        Route::get('links/delete/{id}', [GameController::class, 'deleteLinks']);
        Route::get('links/{game_id}', [GameController::class, 'showLinksForm']);
    });

});