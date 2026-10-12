<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScientificCalculatorController extends Controller
{
    // Function 6: Perpangkatan
    public function power(Request $request)
    {
        $firstNumber = $request->input('base', 2);
        $secondNumber = $request->input('exponent', 3);
        
        $calculationResult = [
            'operation' => 'Pangkat',
            'formula' => "$firstNumber ^ $secondNumber",
            'result' => pow($firstNumber, $secondNumber)
        ];
        return response()->json($calculationResult);
    }

    // Function 7: Akar Kuadrat
    public function squareRoot(Request $request)
    {
        $firstNumber = $request->input('number', 16);
        $secondNumber = 0; // Tidak dipakai dalam akar kuadrat
        
        $calculationResult = [
            'operation' => 'Akar Kuadrat',
            'formula' => "√$firstNumber",
            'result' => sqrt($firstNumber)
        ];
        return response()->json($calculationResult);
    }

    // Function 8: Perhitungan Persentase
    public function percentage(Request $request)
    {
        $firstNumber = $request->input('value', 200);
        $secondNumber = $request->input('percent', 15);
        
        $calculationResult = [
            'operation' => 'Persentase',
            'formula' => "$secondNumber% dari $firstNumber",
            'result' => ($firstNumber * $secondNumber) / 100
        ];
        return response()->json($calculationResult);
    }

    // Function 9: Pembulatan
    public function roundNumber(Request $request)
    {
        $firstNumber = $request->input('number', 12.678);
        $secondNumber = $request->input('decimals', 2);
        
        $calculationResult = [
            'operation' => 'Pembulatan',
            'formula' => "round($firstNumber, $secondNumber)",
            'result' => round($firstNumber, $secondNumber)
        ];
        return response()->json($calculationResult);
    }

    // Function 10: Nilai Mutlak (Absolute)
    public function absoluteValue(Request $request)
    {
        $firstNumber = $request->input('number', -25);
        $secondNumber = 0;
        
        $calculationResult = [
            'operation' => 'Nilai Mutlak',
            'formula' => "|$firstNumber|",
            'result' => abs($firstNumber)
        ];
        return response()->json($calculationResult);
    }
}