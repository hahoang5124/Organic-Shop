<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = ['name', 'img', 'price', 'pricesale', 'percentsale', 'description', 'quantity', 'categoryid'];
    public function  scopeGetAllProduct($query)
    {
        return $query->orderBy('id', 'asc')->get();
    }
    public function  scopeGetProductByCategory($query,$id)
    {
        return $query->where('categoryid', $id);
    }
    public function  scopeGetAllProductWithCategoryName($query)
    {
        return $query->join('categories', 'products.categoryid','=', 'categories.id')
        ->select('products.*','categories.name','products.name as productName', 'categories.name as categoryName')
        ->orderBy('products.id', 'asc');
    }
    public function  scopeGetProductByKeyWord($query,$keyword)
    {
        return $query->where('name', 'like', '%' . $keyword . '%');
    }
}
