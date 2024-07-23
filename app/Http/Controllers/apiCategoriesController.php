<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apiCategoriesModel as Categories;
class apiCategoriesController extends Controller
{
    public function index()
    {
        return Categories::all();
    }

}
