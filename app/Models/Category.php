<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    public function  scopeCategoryGhim($query)
    {
        return $query->where('ghim', '=', 1)->limit(3)->get();
    }
    public function  scopeGetAllCategory($query)
    {
        return $query->orderBy('id', 'desc')->get();
    }

}
