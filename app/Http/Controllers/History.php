<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class History extends Controller
{
    function index() {
        return view("dashboard.history.index");
    }
}
