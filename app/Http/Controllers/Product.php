<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Diskon;
use App\Models\Product as ModelsProduct;
use App\Services\HistoryService;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class Product extends Controller
{
    function index()
    {
        $categories = Category::all();
        $products = ModelsProduct::with("category")->with("diskon")->get();
        return view("dashboard.product.index", [
            "categories" => $categories,
            "products" => $products
        ]);
    }

    function show($id)
    {
        $categories = Category::all();
        $product = ModelsProduct::with("category")->with("diskon")->find($id);
        $expired = $this->checkDiskon($product->id);
        $expired_product = $this->checkExpired($product->id);
        return view("dashboard.product.detail", compact("product", "categories", "expired", "expired_product"));
    }
    function updateView($id)
    {
        $categories = Category::all();
        $product = ModelsProduct::with("category")->find($id);
        return view("dashboard.product.update", compact("product", "categories"));
    }

    function add(Request $request)
    {
        if (!isset($request->category_id)) {
            return back()->with("danger", "Category Tidak boleh kosong !");
        }
        try {
            ModelsProduct::create($request->except("_token"));
            HistoryService::add("Admin menambah data produk");
            return back();
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }

    function remove($id)
    {
        try {
            ModelsProduct::destroy($id);
            HistoryService::add("Admin menghapus data produk");
            return back();
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }

    function update(Request $request)
    {
        try {
            $product = ModelsProduct::find($request->id);
            $product->category_id = ($request->category_id !== null) ? $request->category_id : $product->category_id;
            $product->nama = ($request->nama !== null) ? $request->nama : $product->nama;
            $product->quantity = ($request->quantity !== null) ? $request->quantity : $product->quantity;
            $product->harga = ($request->harga !== null) ? $request->harga : $product->harga;
            $product->deskripsi = ($request->deskripsi !== null) ? $request->deskripsi : $product->deskripsi;
            $product->expired_product = ($request->expired_product !== null) ? $request->expired_product : $product->expired_product;
            $product->save();
            HistoryService::add("Admin mengubah data produk");
            return back();
        } catch (Exception $e) {
            dump($e->getMessage());
        }
    }

    function beli($id)
    {
        $product = ModelsProduct::find($id);
        $product->quantity -= 1;
        $product->buying_count += 1;
        $product->save();
        return redirect("dashboard/product/" . $id);
    }

    function addDiscount(Request $request)
    {
        try {
            $discount_id = Diskon::create($request->except(["_token", "product_id"]))->id;
            $product = ModelsProduct::find($request->product_id);
            $product->diskon_id = $discount_id;
            $product->save();
            return redirect("dashboard/product/" . $request->product_id);
        } catch (Exception $e) {
            return back();
        }
    }

    private function checkDiskon($id): Bool
    {
        $product = ModelsProduct::with("diskon")->find($id);
        if ($product->diskon == null) {
            return false;
        }
        $date = Carbon::now();
        $nowDate = $date->year . "-" . $date->month . "-" . $date->day;
        $exDate = $product->diskon->expired;

        $tanggal_sekarang_obj = new DateTime($nowDate);
        $tanggal_kadaluarsa_obj = new DateTime($exDate);
        return $tanggal_sekarang_obj >= $tanggal_kadaluarsa_obj;
    }

    private function checkExpired($id): Bool
    {
        $product = ModelsProduct::with("diskon")->find($id);
        $date = Carbon::now();
        $nowDate = $date->year . "-" . $date->month . "-" . $date->day;
        $exDate = $product->expired_product;

        $tanggal_sekarang_obj = new DateTime($nowDate);
        $tanggal_kadaluarsa_obj = new DateTime($exDate);
        return $tanggal_sekarang_obj >= $tanggal_kadaluarsa_obj;
    }
}
