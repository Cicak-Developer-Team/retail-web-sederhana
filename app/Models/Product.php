<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "category_id",
        "nama",
        "quantity",
        "harga",
        "deskripsi",
        "expired_product"
    ];

    function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }
    function diskon()
    {
        return $this->hasOne(Diskon::class, "id", "diskon_id");
    }
}
