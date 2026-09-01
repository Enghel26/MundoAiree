<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('activo', true)->count();
        $totalServices = Service::count();
        $totalBrands = Brand::count();
        $totalCategories = Category::count();
        $unreadMessagesCount = ContactMessage::where('leido', false)->count();
        $totalMessagesCount = ContactMessage::count();

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentProducts = Product::with(['category', 'brand'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'totalServices',
            'totalBrands',
            'totalCategories',
            'unreadMessagesCount',
            'totalMessagesCount',
            'recentMessages',
            'recentProducts'
        ));
    }
}
