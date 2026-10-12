<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicCalculatorController extends Controller
{
    // Function 1: Penjumlahan
    public function add(Request $request)
    {
        $firstNumber = $request->input('a', 0);
        $secondNumber = $request->input('b', 0);
        
        $calculationResult = [
            'operation' => 'Penjumlahan',
            'formula' => "$firstNumber + $secondNumber",
            'result' => $firstNumber + $secondNumber
        ];
        return response()->json($calculationResult);
    }

    // Function 2: Pengurangan
    public function subtract(Request $request)
    {
        $firstNumber = $request->input('a', 0);
        $secondNumber = $request->input('b', 0);
        
        $calculationResult = [
            'operation' => 'Pengurangan',
            'formula' => "$firstNumber - $secondNumber",
            'result' => $firstNumber - $secondNumber
        ];
        return response()->json($calculationResult);
    }

    // Function 3: Perkalian
    public function multiply(Request $request)
    {
        $firstNumber = $request->input('a', 0);
        $secondNumber = $request->input('b', 0);
        
        $calculationResult = [
            'operation' => 'Perkalian',
            'formula' => "$firstNumber * $secondNumber",
            'result' => $firstNumber * $secondNumber
        ];
        return response()->json($calculationResult);
    }

    // Function 4: Pembagian
    public function divide(Request $request)
    {
        $firstNumber = $request->input('a', 0);
        $secondNumber = $request->input('b', 1); // default 1 menghindari devide by zero
        
        $calculationResult = [
            'operation' => 'Pembagian',
            'formula' => "$firstNumber / $secondNumber",
            'result' => $secondNumber != 0 ? ($firstNumber / $secondNumber) : 'Error (Division by zero)'
        ];
        return response()->json($calculationResult);
    }

    // Function 5: Modulo (Sisa Bagi)
    public function modulo(Request $request)
    {
        $firstNumber = $request->input('a', 0);
        $secondNumber = $request->input('b', 1);
        
        $calculationResult = [
            'operation' => 'Modulo',
            'formula' => "$firstNumber % $secondNumber",
            'result' => $firstNumber % $secondNumber
        ];
        return response()->json($calculationResult);
    }
}