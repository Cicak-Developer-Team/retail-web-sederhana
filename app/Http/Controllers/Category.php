<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Exception;
use Illuminate\Http\Request;

class Category extends Controller
{
    function index() {
        $data = ModelsCategory::all();
        // dd($data->toArray());
        return view("dashboard.category.index", ["data" => $data]);
    }

    function add(Request $request) {
        try {
            ModelsCategory::create($request->except("_token"));
            return back();
        }catch(Exception $e) {
            dump("Error : " . $e->getMessage());
        }
    }

    function remove($id){
        try {
            ModelsCategory::destroy($id);
            return back();
        }catch(Exception $e) {
            dump("Error : " . $e->getMessage());
        }
    }

    function update(Request $request) {
        try {
            $category = ModelsCategory::find($request->id);
            $category->nama = $request->nama;
            $category->save();
            return back();
        }catch(Exception $e) {
            dump("Error : " . $e->getMessage());
        }
    }
}
