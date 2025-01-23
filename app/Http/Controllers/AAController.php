<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class AAController extends Controller
{
    public function aaSales(Request $request) {
        if ($request->isMethod('post')) {
            $inputs = [
                'inputDataN7' => $request->input('input_data-7'),
                'inputDataN6' => $request->input('input_data-6'),
                'inputDataN5' => $request->input('input_data-5'),
                'inputDataN4' => $request->input('input_data-4'),
                'inputDataN3' => $request->input('input_data-3'),
                'inputDataN2' => $request->input('input_data-2'),
                'inputDataN1' => $request->input('input_data-1'),
                'inputData'   => $request->input('input_data'),
            ];

            $date = new \DateTime($inputs['inputDataN6']);
            [$day, $month, $year] = [$date->format('d'), $date->format('m'), $date->format('Y')];

            $seasons = array_fill(0, 4, 0);
            $seasons[(int)$inputs['inputDataN5'] - 1] = 1;

            $dayTypes = array_fill(0, 3, 0);
            $dayTypes[(int)$inputs['inputDataN4'] - 1] = 1;

            $ranges = array_fill(0, 3, 0);
            $ranges[(int)$inputs['inputDataN3'] - 1] = 1;

            $categories = array_fill(0, 7, 0);
            if ((int)$inputs['inputDataN2'] > 0) {
                $categories[(int)$inputs['inputDataN2'] - 1] = 1;
            }

            $inputData = array_merge(
                [$inputs['inputDataN7'], $inputs['inputDataN1'], $inputs['inputData'], $month, $day, $year],
                $seasons,
                $dayTypes,
                $ranges,
                $categories
            );
    
            $command = 'python aa/aaSales.py ' . implode(' ', $inputData);
            $prediction = trim(shell_exec($command));
    
            return view('sistema.aa.ventas', ['prediction' => $prediction]);
        }
    
        return view('sistema.aa.ventas');
    }
    
}
