<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apiProductModel as Product;
class apiProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

}
