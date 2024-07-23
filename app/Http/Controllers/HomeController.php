<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categoryGhim=Category::CategoryGhim();
        $products = Product::getAllProduct();
        return view('home',compact('categoryGhim','products'));
    }
    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }
}
