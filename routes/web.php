<?php

use App\Http\Controllers\Auth\PlayerController;
use App\Http\Controllers\ListPlayersController;
use App\Http\Controllers\TorneoController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Block\Parser\ListParser;
use App\Models\Torneo;

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
    return view('auth.login');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/CrearTorneo', [PlayerController::class, 'index'])->name('CrearTorneo');
    Route::get('/Jugadores/Estado/{id}/{estado}', [PlayerController::class, 'PlayerStates']);
    Route::get('/Jugadores/{idTorneo}', [PlayerController::class, 'index'])->name('Jugadores');;
    Route::get('/EliminarTorneo/{idTorneo}', [PlayerController::class, 'EliminarTorneo'])->name('EliminarTorneo');;
    Route::post('/Torneo', [TorneoController::class, 'store'])->name('Torneo');
    Route::get('/Torneos', function () {
        $torneos = Torneo::all();
        return view('Torneos', compact('torneos'));
    })->name('torneos');
    Route::delete('/DeletePlayers', [PlayerController::class, 'DeletePlayers'])->name('DeletePlayers');
    Route::delete('/DeletePlayers2', [PlayerController::class, 'DeletePlayers2'])->name('DeletePlayers2');
});


require __DIR__.'/auth.php';
