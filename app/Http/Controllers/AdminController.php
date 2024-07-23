<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\invoices;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function product(){
        $products = Product::getAllProductWithCategoryName()->get();
        $category = Category::GetAllCategory();
        return view('admin.product',compact('products','category'));
    }
    public function addProduct(){
        $category = Category::all();
        return view('admin.addproduct',compact('category'));
    }
    public function createProduct(Request $request){
        $data = $request->only(['name', 'price', 'pricesale', 'percentsale', 'description', 'quantity', 'categoryid']);
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('products', 'public');
            $data['img'] = $imagePath;
        }
        Product::create($data); 
        notify()->success('Thêm sản phẩm thành công','Thêm');
        return redirect()->route('adminproduct');
    }
    public function editProduct(Request $request){
        $category = Category::all();
        $id = $request->id;
        $product = Product::findOrFail($id);
        return view('admin.addproduct',compact('product', 'category', 'id'));
    }
    public function updateProduct(Request $request){
        $product = Product::findOrFail($request->id);
        $data = $request->only(['name', 'price', 'pricesale', 'percentsale', 'description', 'quantity', 'categoryid']);
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('products', 'public');
            $data['img'] = $imagePath;
        }
        echo '<pre>';
/*         print_r($data);
        echo '</pre>';
        return; */
        $product->update($data);
        notify()->success('Cập nhật sản phẩm thành công','Cập nhật');
        return redirect()->route('adminproduct');
    }
    public function deleteProduct(Request $request){
        $product = Product::findOrFail($request->id);
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }    
        $product->delete();
        notify()->success('Xóa sản phẩm thành công','Xóa');
        return redirect()->route('adminproduct');
    }
    public function user(){
        return view('admin.user');
    }
}
