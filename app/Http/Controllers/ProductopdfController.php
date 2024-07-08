<?php

namespace App\Http\Controllers;
use Dompdf\Options;
use Dompdf\Dompdf;
//use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\UnidadMedida;
use App\Models\Marca;
use App\Models\Categoria;


class ProductopdfController extends Controller
{
    //
    public function pdf()
    {

        
           
    // Obtener los datos necesarios para el reporte
    $productos = Producto::all();
    

    //return view('sistema.producto.pdf', compact('productos'));

    //$unidades = UnidadMedida::all();
    //$marcas = Marca::all();
    //$categorias = Categoria::all();
    
    //dd($productos, $unidades, $marcas, $categorias);

    // Configurar las opciones de Dompdf
    $options = new Options();
    $options->set('defaultFont', 'Arial');

    // Crear una instancia de Dompdf
    $dompdf = new Dompdf($options);

    // Cargar la vista promocion.pdf en una variable
    $html = view('sistema.producto.pdf', compact('productos'))->render();

    // Cargar el HTML en Dompdf
    $dompdf->loadHtml($html);

    // Renderizar el PDF
    $dompdf->render();

    // Devolver la respuesta con el PDF
    return $dompdf->stream('sistema.producto.pdf');


    }
}