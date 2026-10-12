<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancialCalculatorController extends Controller
{
    // Function 11: Hitung Potongan Diskon
    public function calculateDiscount(Request $request)
    {
        $firstNumber = $request->input('price', 100000); // Harga Awal
        $secondNumber = $request->input('discount_percent', 20); // Diskon %

        $discountAmount = ($firstNumber * $secondNumber) / 100;
        $calculationResult = [
            'operation' => 'Hitung Diskon',
            'original_price' => $firstNumber,
            'discount_amount' => $discountAmount,
            'final_price' => $firstNumber - $discountAmount
        ];
        return view('calculator_result', $calculationResult);
    }

    // Function 12: Hitung Pajak PPN
    public function calculateTax(Request $request)
    {
        $firstNumber = $request->input('amount', 500000); // Nominal
        $secondNumber = $request->input('tax_percent', 11); // PPN %

        $taxAmount = ($firstNumber * $secondNumber) / 100;
        $calculationResult = [
            'operation' => 'Hitung PPN',
            'amount' => $firstNumber,
            'tax_amount' => $taxAmount,
            'total_with_tax' => $firstNumber + $taxAmount
        ];
        return view('calculator_result', $calculationResult);
    }

    // Function 13: Hitung Estimasi Bunga Sederhana
    public function calculateInterest(Request $request)
    {
        $firstNumber = $request->input('principal', 1000000); // Modal Awal
        $secondNumber = $request->input('rate_percent', 5); // Suku Bunga %

        $interest = ($firstNumber * $secondNumber) / 100;
        $calculationResult = [
            'operation' => 'Bunga Sederhana',
            'principal' => $firstNumber,
            'interest_rate' => "$secondNumber%",
            'interest_amount' => $interest
        ];
        return view('calculator_result', $calculationResult);
    }

    // Function 14: Konversi Mata Uang (USD ke IDR Contoh)
    public function currencyConvert(Request $request)
    {
        $firstNumber = $request->input('amount_usd', 10); // USD
        $secondNumber = $request->input('exchange_rate', 15500); // Kurs IDR

        $calculationResult = [
            'operation' => 'Konversi Mata Uang',
            'usd' => $firstNumber,
            'rate' => $secondNumber,
            'result_idr' => $firstNumber * $secondNumber
        ];
        return view('calculator_result', $calculationResult);
    }

    // Function 15: Rekap Total Tagihan Akhir
    public function totalBill(Request $request)
    {
        $firstNumber = $request->input('subtotal', 200000);
        $secondNumber = $request->input('service_fee', 5000);

        $calculationResult = [
            'operation' => 'Total Tagihan',
            'subtotal' => $firstNumber,
            'service_fee' => $secondNumber,
            'total' => $firstNumber + $secondNumber
        ];
        return view('calculator_result', $calculationResult);
    }
}
