<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

Route::middleware(['web'])->group(function () {

    // -------------------------------------------------------------
    // ROUTER 1: Asset Router Group (/api/assets)
    // -------------------------------------------------------------
    Route::prefix('assets')->name('api.assets.')->group(function () {
        Route::get('/', [AssetController::class, 'index'])->name('index');
        Route::get('/{id}', [AssetController::class, 'show'])->name('show');
        Route::get('/search/{keyword}', [AssetController::class, 'search'])->name('search');
        Route::get('/software/{type}', [AssetController::class, 'filterBySoftware'])->name('software');
        Route::get('/preview/{id}', [AssetController::class, 'getPreview3D'])->name('preview');
    });

    // -------------------------------------------------------------
    // ROUTER 2: Cart Router Group (/api/cart)
    // -------------------------------------------------------------
    Route::prefix('cart')->name('api.cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{assetId}', [CartController::class, 'add'])->name('add');
        Route::delete('/remove/{assetId}', [CartController::class, 'remove'])->name('remove');
        Route::get('/total', [CartController::class, 'calculateTotal'])->name('total');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    });

    // -------------------------------------------------------------
    // ROUTER 3: Transaction Router Group (/api/transactions)
    // -------------------------------------------------------------
    Route::prefix('transactions')->name('api.transactions.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
        Route::get('/{trxId}', [TransactionController::class, 'detail'])->name('detail');
        Route::get('/download/{trxId}/{assetId}', [TransactionController::class, 'getDownloadLink'])->name('download');
        Route::get('/summary/sales', [TransactionController::class, 'summary'])->name('summary');
    });

    // CRUD Asset 3D
    Route::prefix('v2/assets')->group(function () {
        Route::get('/', [AssetController::class, 'index']);
        Route::post('/', [AssetController::class, 'store']);
        Route::get('/{id}', [AssetController::class, 'show']);
        Route::put('/{id}', [AssetController::class, 'update']);
        Route::delete('/{id}', [AssetController::class, 'destroy']);
    });

    // CRUD Category
    Route::prefix('v2/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    // READ Orders (Relasi Kompleks 5 Tabel)
    Route::prefix('v2/orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
    });

});