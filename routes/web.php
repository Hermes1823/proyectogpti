<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\PdfproveedorController;
use App\Http\Controllers\PdfcategoriaController;
use App\Http\Controllers\PdfmarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductopdfController;
use App\Http\Controllers\RgraficoController;
use App\Models\Producto;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/categoria',CategoriaController::class)->names('categoria');
    Route::resource('/marca',MarcaController::class)->names('marca');
    Route::resource('/producto',ProductoController::class)->names('producto');
    Route::get('/prueva/pdf', [ProductopdfController::class, 'pdf'])->name('prueba.pdf');
    Route::get('/proveedores/pdf', [PdfproveedorController::class, 'pdf'])->name('proveedor.pdf');
    Route::get('/categorias/pdf', [PdfcategoriaController::class, 'pdf'])->name('categoria.pdf');
    Route::get('/marcas/pdf', [PdfmarcaController::class, 'pdf'])->name('marca.pdf');
    Route::resource('/proveedor',ProveedorController::class)->names('proveedor');
    Route::resource('/ordencompra',OrdenCompraController::class)->names('ordencompra');

    Route::get('/grafico', [RgraficoController::class, 'index'])->name('rgrafico');
});
