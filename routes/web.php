<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ListMahasiswaController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BasicCalculatorController;
use App\Http\Controllers\ScientificCalculatorController;
use App\Http\Controllers\FinancialCalculatorController;

use function Laravel\Ai\{agent};
use illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/katalog', [AssetController::class, 'indexWeb']);
Route::get('/katalog', [AssetController::class, 'indexWeb']);
Route::get('/katalog/{id}', [AssetController::class, 'showWeb']); // Route Detail Web
Route::get('/katalog/buy/{id}', [AssetController::class, 'buyWeb']); // Route Beli/Aksi Web

// opsi 1
Route::get('/listmahasiswa', function () {
    return 'UlerSakti';
});

Route::prefix('v1')->group(function(){
    Route::get('/List-Mahasiswa', [ListMahasiswaController::class, 'ListMahasiswaFromController']);
    Route::get('/List-Mahasiswa/{nama}', [ListMahasiswaController::class, 'NamaMahasiswa']);
    Route::get('/kalkulator/{angka1}/{angka2}', [KalkulatorController::class, 'Hasil']);
});

Route::get('/datadiri', [DataDiriController::class, 'index']);

// ROUTER 1: Kalkulator Dasar (5 Function)
Route::prefix('calc-basic')->group(function () {
    Route::get('/add', [BasicCalculatorController::class, 'add']);
    Route::get('/subtract', [BasicCalculatorController::class, 'subtract']);
    Route::get('/multiply', [BasicCalculatorController::class, 'multiply']);
    Route::get('/divide', [BasicCalculatorController::class, 'divide']);
    Route::get('/modulo', [BasicCalculatorController::class, 'modulo']);
    Route::get('/fallback', [BasicCalculatorController::class, 'fallback']);
});

// ROUTER 2: Kalkulator Saintifik (5 Function)
Route::prefix('calc-scientific')->group(function () {
    Route::get('/power', [ScientificCalculatorController::class, 'power']);
    Route::get('/square-root', [ScientificCalculatorController::class, 'squareRoot']);
    Route::get('/percentage', [ScientificCalculatorController::class, 'percentage']);
    Route::get('/round', [ScientificCalculatorController::class, 'roundNumber']);
    Route::get('/absolute', [ScientificCalculatorController::class, 'absoluteValue']);
});

// ROUTER 3: Kalkulator Finansial (5 Function)
Route::prefix('calc-financial')->group(function () {
    Route::get('/discount', [FinancialCalculatorController::class, 'calculateDiscount']);
    Route::get('/tax', [FinancialCalculatorController::class, 'calculateTax']);
    Route::get('/interest', [FinancialCalculatorController::class, 'calculateInterest']);
    Route::get('/currency', [FinancialCalculatorController::class, 'currencyConvert']);
    Route::get('/total-bill', [FinancialCalculatorController::class, 'totalBill']);
});

Route::get('/ai', function () {
    $response = agent(
        instructions: 'Kamu adalah asisten AI yang helpful',
    )->prompt('buatkan foto pemandangan gunung yang indah');

    $html = Str::markdown((string) $response);

    return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>AI Generated Page</title>
            <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: #ffffff;
            padding: auto;
            border-radius: auto;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: auto;
        }
        h2 {
            margin-top: 0;
            color: #1f2937;
        }
        p {
            margin: 8px 0;
            color: #4b5563;
        }
        ul {
            padding-left: 20px;
            color: #374151;
        }
    </style>
        </head>
        <body>
            <div class="card">
                {$html}
            </div>
        </body>
        </html>
    HTML;
});