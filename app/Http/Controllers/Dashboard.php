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
        $product = Product::with("category")->orderBy("buying_count", "DESC")->first();
        return view("dashboard.index", compact("product"));
    }
}
