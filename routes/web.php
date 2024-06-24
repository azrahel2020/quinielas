<?php

use App\Http\Controllers\BetController;
use App\Http\Controllers\BetsUsuarioController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PosicionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuinielaBetsUsuario;
use App\Http\Controllers\QuinielaController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Quiniela;
use Illuminate\Support\Facades\Route;

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

//Ruta Admin 
Route::group(['middleware' => ['auth','admin']], function () {
    // Ruta Team
    Route::get('/admin/teams', [TeamController::class, 'index'])->name('admin.teams.index');
    Route::get('/admin/teams/create', [TeamController::class, 'create'])->name('admin.teams.create');
    Route::post('/admin/teams/create', [TeamController::class, 'store'])->name('admin.teams.store');
    Route::get('/admin/teams/show/{team}', [TeamController::class, 'show'])->name('admin.teams.show');
    Route::get('/admin/teams/{team}/edit', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::put('/admin/teams/{team}', [TeamController::class, 'update'])->name('admin.teams.update');
    Route::delete('/admin/teams/{team}', [TeamController::class, 'destroy'])->name('admin.teams.destroy');

    // Ruta Quinielas
    Route::get('/admin/quinielas', [QuinielaController::class, 'index'])->name('admin.quinielas.index');
    Route::get('/admin/quinielas/create', [QuinielaController::class, 'create'])->name('admin.quinielas.create');
    Route::post('/admin/quinielas/create', [QuinielaController::class, 'store'])->name('admin.quinielas.store');
    Route::get('/admin/quinielas/show/{quiniela}', [QuinielaController::class, 'show'])->name('admin.quinielas.show');
    Route::get('/admin/quinielas/{quiniela}/edit', [QuinielaController::class, 'edit'])->name('admin.quinielas.edit');
    Route::put('/admin/quinielas/{quiniela}', [QuinielaController::class, 'update'])->name('admin.quinielas.update');
    Route::delete('/admin/quinielas/{quiniela}', [QuinielaController::class, 'destroy'])->name('admin.quinielas.destroy');


    // Ruta games
    Route::get('/admin/quinielas/{quinielaId}/games', [GameController::class, 'index'])->name('admin.games.index');
    Route::get('/admin/quinielas/{quinielaId}/games/create', [GameController::class, 'create'])->name('admin.games.create');
    Route::post('/admin/quinielas/games/create', [GameController::class, 'store'])->name('admin.games.store');
    Route::get('/admin/quinielas/games/show/{game}', [GameController::class, 'show'])->name('admin.games.show');
    Route::get('/admin/quinielas/games/{game}/edit', [GameController::class, 'edit'])->name('admin.games.edit');
    Route::put('/admin/quinielas/games/{game}', [GameController::class, 'update'])->name('admin.games.update');
    Route::delete('/admin/quinielas/games/{game}', [GameController::class, 'destroy'])->name('admin.games.destroy');
    /* Route::resource('admin/games', GameController::class); */

    // Ruta resultados
    Route::get('/admin/quinielas/{quinielaId}/results', [ResultController::class, 'index'])->name('admin.results.index');
    Route::post('/admin/quinielas/{quinielaId}/results', [ResultController::class, 'store'])->name('admin.results.store');
   
   
    // Ruta apuestas
    Route::get('/admin/quinielas/{quinielaId}/bets', [BetController::class, 'index'])->name('admin.bets.index');
    Route::post('/admin/quinielas/{quinielaId}/bets', [BetController::class, 'store'])->name('admin.bets.store');

    /* Route::resource('admin/bets', BetController::class); */
   
});

// Rutas Usuarios
    Route::group(['middleware' => ['auth']], function () {
    Route::get('/quinielas', [BetsUsuarioController::class, 'quinielas'])->name('usuarios.bets.quinielas');
    

    Route::get('/quinielas/{quinielaId}/apuestas', [BetsUsuarioController::class, 'apuestas'])->name('usuarios.bets.apuestas');
    Route::get('/quinielas/{quinielaId}/apuestas/create', [BetsUsuarioController::class, 'create'])->name('usuarios.bets.create');
    Route::post('/quinielas/{quinielaId}/apuestas', [BetsUsuarioController::class, 'store'])->name('usuarios.bets.store');

    Route::get('/quinielas/{quinielaId}/bets/', [BetsUsuarioController::class, 'apuestaPorUsuario'])->name('usuarios.bets.apuestaporusuario');

    
    Route::get('/quinielas/{quinielaId}/puntos', [PointController::class, 'index'])->name('usuarios.bets.index');
    Route::get('/quinielas/{quinielaId}/calcular-puntos', [PointController::class, 'calcularPuntos'])->name('usuarios.bets.calcularPuntos');
    Route::get('/quinielas/{quinielaId}/totales', [PointController::class, 'totales'])->name('usuarios.bets.totales');
    Route::get('/quinielas/{quinielaId}/totalfinal', [PointController::class, 'updateTotalFinal'])->name('usuarios.bets.updateTotalFinal');
    



    

});




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
