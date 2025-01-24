<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AAController extends Controller
{
    public function aaSales(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'year' => 'required|integer',
                'month' => 'required|integer|min:1|max:12',
                'day' => 'required|integer|min:1|max:31',
                'day_of_week' => 'required|integer|min:0|max:6',
            ]);

            $command = escapeshellcmd("python aa/aaSales1Predict.py {$validated['year']} {$validated['month']} {$validated['day']} {$validated['day_of_week']}");
    
            $prediction = shell_exec($command);

            if ($prediction === null) {
                return response()->json(['error' => 'Ocurrió un error al ejecutar el script de predicción.'], 500);
            }

            return view('sistema.aa.ventas', ['prediction' => $prediction]);
        }
    
        return view('sistema.aa.ventas');
    }
    
}
