<?php

namespace App\Http\Controllers;

use App\Models\History as ModelsHistory;
use Illuminate\Http\Request;

class History extends Controller
{
    function index() {
        $data = ModelsHistory::all();
        return view("dashboard.history.index", [
            "data" => $data
        ]);
    }
}
