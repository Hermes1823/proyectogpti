<?php

use App\Http\Controllers\ReabesticimientoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GroupRestController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\OrdenVentaController;
use App\Http\Controllers\PdfproveedorController;
use App\Http\Controllers\PdfcategoriaController;
use App\Http\Controllers\PdfmarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductopdfController;
use App\Http\Controllers\ReportegraficoController;
use App\Http\Controllers\RgraficocircularController;
use App\Http\Controllers\RgraficoController;
use App\Models\Producto;
use App\Http\Controllers\reporteaController;
use App\Models\Reportea;

use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\AAController;

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
    Route::resource('/cliente', ClienteController::class)->names('cliente');
    Route::resource('/categoria',CategoriaController::class)->names('categoria');
    Route::resource('/marca',MarcaController::class)->names('marca');
    Route::resource('/producto',ProductoController::class)->names('producto');
    Route::get('/prueva/pdf', [ProductopdfController::class, 'pdf'])->middleware('can:prueba.pdf')->name('prueba.pdf');
    Route::get('/proveedores/pdf', [PdfproveedorController::class, 'pdf'])->middleware('can:proveedor.pdf')->name('proveedor.pdf');
    Route::get('/categorias/pdf', [PdfcategoriaController::class, 'pdf'])->middleware('can:categoria.pdf')->name('categoria.pdf');
    Route::get('/marcas/pdf', [PdfmarcaController::class, 'pdf'])->middleware('can:marca.pdf')->name('marca.pdf');
    Route::resource('/proveedor',ProveedorController::class)->names('proveedor');
    Route::resource('/ordencompra',OrdenCompraController::class)->names('ordencompra');

    Route::get('/grafico', [RgraficoController::class, 'index'])->name('rgrafico');

    Route::get('/graficocircular', [RgraficocircularController::class, 'index'])->name('rgraficocircular');
    Route::get('/reportesgraficos', [ReportegraficoController::class, 'index'])->name('reportesgraficos');


    //Route::get('/graficojson', [GroupRestController::class, 'totalProductosPorCategoria']);
    Route::get('reportea',[reporteaController::class, 'index'])->name('reportea');
    Route::resource('/ordenventa', OrdenVentaController::class)->names('ordenventa');
    Route::get('/grafico', [RgraficoController::class, 'index'])->middleware('can:rgrafico')->name('rgrafico');

    Route::get('/salesIndicator', [IndicatorController::class, 'salesIndicator'])->name('indicator.sales');
    Route::get('/reabastecimientoIndicator', [IndicatorController::class, 'reabastecimientoIndicator'])->name('S');

    Route::get('/exportSalesIndicator', [IndicatorController::class, 'exportSalesIndicator'])->name('indicator.sales.export');
    Route::get('/exportReabastecimientoIndicator', [IndicatorController::class, 'exportReabastecimientoIndicator'])->name('indicator.abastacimiento.export');
    Route::get('/exportBusquedaIndicator', [IndicatorController::class, 'exportBusquedaIndicator'])->name('indicator.busqueda.export');



    Route::get('/aaSales', function () {
        return view('sistema.aa.ventas');
    });

    Route::post('/aaSales', [AAController::class, 'aaSales'])->name('aa.sales');
    Route::resource("reabesticimiento",ReabesticimientoController::class);
    Route::get( "indicadorReabestecimiento",[IndicatorController::class,"reabastecimientoIndicator"])->name("indicator.reabastecimiento");
    Route::get( "indicadorBusquedaProducto",[IndicatorController::class,"busquedaProducto"])->name("indicator.busqueda");

});
