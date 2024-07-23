<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_details extends Model
{
    use HasFactory;
    protected $fillable = ['invoiceid','productid','quantity','price'];
    public function scopegetAllCart($query, $cartId){
        return $query->join('products', 'invoice_details.productid','=', 'products.id')
        ->select('products.*','invoice_details.price as itemprice','invoice_details.quantity as itemquantity')->where('invoiceid', $cartId);
    }
    public function scopeCheckProductInCart($query, $cartId,$productId){
        return $query->where('invoiceid', $cartId)->where('productid', $productId);
    }
    public function scopedeleteItemInCart($query, $cartId,$productId){
        return $query->where('invoiceid', $cartId)->where('productid', $productId);
    }
}
