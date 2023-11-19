<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    function index(){
        $categories = Category::all();
        return view("dashboard.index",[
            "categories" => $categories
        ]);
    }
}
