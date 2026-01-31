<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        \Illuminate\Support\Facades\View::share('categories', Category::all());
        \Illuminate\Support\Facades\View::share('products', Product::with(['kategori', 'motif'])
            ->latest()
            ->take(8)
            ->get());
    }
}
