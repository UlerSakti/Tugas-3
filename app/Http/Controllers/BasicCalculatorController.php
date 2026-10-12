<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BasicCalculatorController extends Controller
{
    // Function 1: Penjumlahan
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'a' => 'required|numeric',
            'b' => 'required|numeric',
        ], [
            'a.required' => 'Input A tidak boleh kosong!',
            'a.numeric'  => 'Input A mengandung karakter tidak valid! Harap masukkan angka murni tanpa tanda petik atau huruf.',
            'b.required' => 'Input B tidak boleh kosong!',
            'b.numeric'  => 'Input B mengandung karakter tidak valid! Harap masukkan angka murni tanpa tanda petik atau huruf.',
        ]);

        if ($validator->fails()) {
            return view('calculator_result', [
                'hasError' => true,
                'errors'   => $validator->errors()->all()
            ]);
        }

    $firstNumber = (float) $request->input('a');
    $secondNumber = (float) $request->input('b');
        
        $calculationResult = [
            'status'    => 'Success',
            'operation' => 'Penjumlahan',
            'formula'   => "$firstNumber + $secondNumber",
            'result'    => $firstNumber + $secondNumber
        ];
        return view('calculator_result', $calculationResult);
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
        return view('calculator_result', $calculationResult);
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
        return view('calculator_result', $calculationResult);
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
        return view('calculator_result', $calculationResult);
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
        return view('calculator_result', $calculationResult);
    }

}