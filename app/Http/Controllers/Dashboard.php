<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    function index(){
        return "Welcome " . Auth::user()->name;
    }
}
