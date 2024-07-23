<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'img', 'price', 'pricesale', 'percentsale', 'description', 'quantity', 'categoryid'];


    public function apiProductsModel(){
        return $this->belongsTo(apiCategoriesModel::class);
    }

}
