<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use App\Services\HistoryService;
use Exception;
use Illuminate\Http\Request;

class Product extends Controller
{
    function add( Request $request ) {
        try {
            ModelsProduct::create($request->except("_token"));
            HistoryService::add("Admin menambah data produk");
            return back();
        }catch (Exception $e) {
            dump($e->getMessage());
        }
    }

    function remove($id) {
        try {
            ModelsProduct::destroy($id);
            HistoryService::add("Admin menghapus data produk");
            return back();
        }catch (Exception $e) {
            dump($e->getMessage());
        }
    }
    
    function update(Request $request){
        try {
            $product = ModelsProduct::find($request->id);
            $product->category_id = ($request->category_id !== null)? $request->category_id : $product->category_id;
            $product->nama = ($request->nama !== null)? $request->nama : $product->nama;
            $product->quantity = ($request->quantity !== null)? $request->quantity : $product->quantity;
            $product->harga = ($request->harga !== null)? $request->harga : $product->harga;
            $product->deskripsi = ($request->deskripsi !== null)? $request->deskripsi : $product->deskripsi;
            $product->save();
            HistoryService::add("Admin mengubah data produk");
            return back();
        }catch (Exception $e) {
            dump($e->getMessage());
        }
    }
}
