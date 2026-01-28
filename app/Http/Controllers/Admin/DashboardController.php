<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_products = Product::count();
        $total_categories = Category::count();
        $total_users = User::count();
        $recent_products = Product::with('kategori')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        return view('admin.dashboard', compact(
            'total_products',
            'total_categories', 
            'total_users',
            'recent_products',
        ));
    }
}