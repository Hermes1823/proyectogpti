<?php

use App\Http\Controllers\GroupRestController;
use App\Http\Controllers\OrdenVentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReabesticimientoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

// En routes/api.php para rutas API

Route::post("/busqueda-producto",[ProductoController::class,"busquedaProducto"])->name("busquedaProducto");
Route::get('/graficojson1', [GroupRestController::class, 'totalProductosPorCategoria']);
Route::get('search_orden_proveedor/{id}', [ReabesticimientoController::class,'search_order_provee'])->name("reabastecimiento.proveedor_orden");
Route::get('details_orden/{id}', [ReabesticimientoController::class,'detalles_orden'])->name("reabastecimiento.detalles_orden");
Route::get("reporteVenta/{anioInico}/{anioFin}", [OrdenVentaController::class,"showReporteVenta"])->name("ordenVenta.reporteVenta");

