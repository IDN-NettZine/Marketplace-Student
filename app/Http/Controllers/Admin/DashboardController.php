<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUser' => User::where('role', 'user')->count(),
            'totalToko' => Store::count(),
            'totalProduk' => Product::count(),
            'totalPesanan' => Order::count(),
        ]);
    }
}
