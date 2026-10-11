<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // READ Order lengkap dengan relasi User, Items, Asset & License
    public function index()
    {
        $orders = Order::with(['user', 'discount', 'items.asset', 'items.license'])->get();
        return response()->json(['status' => 'success', 'data' => $orders]);
    }

    // READ Detail 1 Order Spesifik
    public function show($id)
    {
        $order = Order::with(['user', 'discount', 'items.asset', 'items.license'])->find($id);
        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order tidak ditemukan'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $order]);
    }
}