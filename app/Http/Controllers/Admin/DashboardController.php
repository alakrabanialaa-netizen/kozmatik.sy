<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Order::where('status', 'completed')->sum('total_amount');
        $totalCost = Order::where('status', 'completed')->sum('total_cost');
        $netProfit = $totalSales - $totalCost; // صافي الربح
        
        $totalOrders = Order::count();
        $lowStockProducts = Product::where('stock', '<=', 5)->get(); // المنتجات القريبة من النفاد

        return view('admin.dashboard', compact('totalSales', 'netProfit', 'totalOrders', 'lowStockProducts'));
    }
}