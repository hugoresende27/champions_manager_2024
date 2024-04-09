<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
            
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/startgame', [HomeController::class, 'startGame'])->name('startgame');
Route::get('/saved-games', [HomeController::class, 'savedGames'])->name('savedgames');
Route::get('/loadgame/{game_id}', [DashboardController::class, 'loadgame'])->name('loadgame');
Route::delete('/delete-game/{game_id}', [HomeController::class, 'deleteGames'])->name('deletegame');



// Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');


	


	Route::get('squad', [DashboardController::class, 'squad'])->name('squad');
	Route::get('team-profile', [DashboardController::class, 'teamProfile'])->name('team-profile');
	Route::get('team-game/{team_id}', [DashboardController::class, 'teamGame'])->name('team-game');
	Route::get('team-management', [DashboardController::class, 'teamManagement'])->name('team-management');
	Route::get('training', [DashboardController::class, 'training'])->name('training');
	Route::get('finances', [DashboardController::class, 'finances'])->name('finances');
	Route::get('calendar', [DashboardController::class, 'calendar'])->name('calendar');
	Route::get('tactics', [DashboardController::class, 'tactics'])->name('tactics');
	Route::get('next', [DashboardController::class, 'next'])->name('next');
	Route::post('coach-settings-team/{game_id}', [DashboardController::class, 'updateCoachTeamSettings'])->name('coach-settings.team.update');
	Route::post('coach-settings-training/{game_id}', [DashboardController::class, 'updateCoachTrainingSettings'])->name('coach-settings.training.update');
	Route::post('coach-settings-tactics/{game_id}', [DashboardController::class, 'updateCoachTacticsSettings'])->name('coach-settings.tactics.update');



	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});