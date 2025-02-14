<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Prediction;
use PDF;

use Illuminate\Support\Facades\Log;

class AAController extends Controller
{
    public function aaSales(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $validated = $request->validate([
                'year' => 'required|integer',
                'month' => 'required|integer|min:1|max:12',
                'day' => 'required|integer|min:1|max:31',
                'day_of_week' => 'required|integer|min:0|max:6',
            ]);

            $command = escapeshellcmd("python aa/aaSales1Predict.py {$validated['year']} {$validated['month']} {$validated['day']} {$validated['day_of_week']}");
    
            $prediction = shell_exec($command);

            if ($prediction === null) 
            {
                return response()->json(['error' => 'Ocurrió un error al ejecutar el script de predicción.'], 500);
            }

            $savedPrediction = Prediction::create([
                'year' => $validated['year'],
                'month' => $validated['month'],
                'day' => $validated['day'],
                'day_of_week' => $validated['day_of_week'],
                'prediction' => trim($prediction / 64)
            ]);

            $predictions = Prediction::all();

            return view('sistema.aa.ventas', ['prediction' => $prediction, 'predictions' => $predictions]);
        }

        $predictions = Prediction::all();

        return view('sistema.aa.ventas', ['predictions' => $predictions]);
    }

    public function generateReport()
    {
        $predictions = Prediction::all();
        $pdf = PDF::loadView('sistema.aa.reporte', ['predictions' => $predictions]);

        return $pdf->download('reporte_predicciones.pdf');
    }
    
}
