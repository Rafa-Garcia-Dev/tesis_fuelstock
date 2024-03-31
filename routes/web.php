<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;


use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\Compra;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    // Si el usuario está autenticado, redirigirlo a la ruta de "reportes"
    if (auth()->check()) {
        return redirect()->route('reportes.index');
    }
    // Si el usuario no está autenticado, redirigirlo a la ruta de "login"
    return redirect()->route('login');
});

// Route::get('/', function () {
//     // Si el usuario está autenticado, redirigirlo a la ruta de "reportes"
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::redirect('/dashboard', '/compras');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Compras Controllers
    Route::get('/compras', [CompraController::class,'index'])
    ->name('compras');

    Route::post('/compras', [CompraController::class,'store'])
    ->name('compras.store');

     Route::get('/compras/lista', [CompraController::class, 'returnCompras'])
    ->name('compras.returnCompras');

    Route::delete('/compras/{id}', [CompraController::class, 'destroy']);

    Route::put('/compras/update', [CompraController::class, 'update'])->name('compras.update');

  
     // Medidas Controllers
    
     Route::post('/medidas', [MedidaController::class,'store'])
     ->name('medidas.store');
 
     Route::get('/medidas/lista', [MedidaController::class, 'returnMedidas'])
     ->name('medidas.returnMedidas');
    
     Route::delete('/medidas/{id}', [MedidaController::class, 'destroy']);

     Route::put('/medidas/update', [MedidaController::class, 'update'])->name('medidas.update');

    // Ventas Controllers
    Route::post('/ventas', [VentaController::class, 'updateVentas'])
     ->name('ventas.insert');

      // Report controller
    Route::post('/ventas/report', [VentaController::class, 'fillData'])
    ->name('ventas.report');



    Route::get('/reportes', function () {
        return view('reportes.index');
    })->name('reportes');

  

});


require __DIR__.'/auth.php';
