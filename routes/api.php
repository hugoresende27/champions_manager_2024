<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('teams/{team_id}', [ApiController::class, 'getTeamsById'])->name('teams_by_id');
Route::get('teams/country/{country_id}', [ApiController::class, 'getTeamsByCountry'])->name('teams_by_country');



Route::get('players/{team_id}', [ApiController::class, 'getPlayersById'])->name('players_by_id');
Route::get('players/country/{country_id}', [ApiController::class, 'getPlayersByCountryId'])->name('players_by_country_id');
Route::get('players/team/{team_id}', [ApiController::class, 'getPlayersByTeamId'])->name('players_by_team_id');

