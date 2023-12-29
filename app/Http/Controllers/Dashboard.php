<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    function index()
    {
        $categories = Category::all();
        $products = Product::with("category")->get();
        return view("dashboard.index");
    }
}
