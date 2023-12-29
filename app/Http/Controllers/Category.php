<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use App\Services\HistoryService;
use Exception;
use Illuminate\Http\Request;

class Category extends Controller
{
    function index()
    {
        $data = ModelsCategory::all();
        return view("dashboard.category.index", ["data" => $data]);
    }

    function updateView($id)
    {
        $data = ModelsCategory::find($id);
        return view("dashboard.category.update", compact("data"));
    }

    function add(Request $request)
    {
        try {
            ModelsCategory::create($request->except("_token"));
            HistoryService::add("Admin menambah data category");
            return back();
        } catch (Exception $e) {
            dump("Error : " . $e->getMessage());
        }
    }

    function remove($id)
    {
        try {
            ModelsCategory::destroy($id);
            HistoryService::add("Admin menghapus data category");
            return back();
        } catch (Exception $e) {
            dump("Error : " . $e->getMessage());
        }
    }

    function update(Request $request)
    {
        try {
            $category = ModelsCategory::find($request->id);
            $category->nama = $request->nama;
            $category->save();
            HistoryService::add("Admin mengubah data category");
            return back();
        } catch (Exception $e) {
            dump("Error : " . $e->getMessage());
        }
    }
}
