<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\invoices;
use App\Models\invoice_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
class ProductController extends Controller
{
    public function list(){
        $request = Request::create('/api/products', 'GET');
        $response = app()->handle($request);
        
        // Lấy dữ liệu từ phản hồi
        $data = json_decode($response->getContent(), true);
    
        // Tiếp tục xử lý dữ liệu như bình thường
        $products = collect($data)->map(function ($item) {
            return (object)$item;
        });
        $category = Category::all();
        return view('product.list', compact('products', 'category'));
    }
    public function listByCategory(request $request){
        $product_id = $request->id;
        $category = Category::all();
        $products = Product::getProductByCategory($product_id)->paginate(9);
        return view('product.list',compact('products','category'));
    }
    public function detail(request $request){
        $product_id = $request->id;
        $product = Product::find($product_id);
        $productsByCategory = Product::getProductByCategory($product_id);
        return view('product.detail',compact('product','productsByCategory'));
    }
    public function search(request $request){
        $keyword = $request->search;
        session(['keyword' => $keyword]);
        var_dump(session('keyword'));
        $products = Product::GetProductByKeyWord(session('keyword'))->paginate(1);
        $category = Category::all();
        return view('product.list',compact('products','category'));
    }
    public function cart(){
        // Kiểm tra user đã có invoice chưa
        if(!empty(Auth::user())){
            $userId = Auth::user()->id;
            $checkCart = invoices::checkCart($userId)->get();
            if($checkCart->isEmpty()){
                invoices::create([
                    'userid' => $userId,
                ]);
            }
        }else{
            return redirect()->route('login');
        }
        $userId = Auth::user()->id;
        $checkCart = invoices::checkCart($userId)->First();
        $listItems = invoice_details::getAllCart($checkCart->id)->get();
        return view('cart',compact('listItems'));
    }
    public function addToCart(Request $request){
        if(empty(Auth::user())){
            return redirect()->route('login');
        }
        $userId = Auth::user()->id;
        $checkCart = invoices::checkCart($userId)->First();
        $checkItemInvoice = invoice_details::CheckProductInCart($checkCart->id,$request->id)->get();
        // kiểm tra sản phẩm đã có trong hóa đơn chưa
        if($checkItemInvoice->isEmpty()){
            invoice_details::create([
                'invoiceid' => $checkCart->id,
                'productid' => $request->id,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);
        }else{
            $checkItemInvoice = invoice_details::CheckProductInCart($checkCart->id,$request->id)->first();
            invoice_details::where('id', $checkItemInvoice->id)->update([
                'quantity' => $checkItemInvoice->quantity + $request->quantity,
            ]);
        }
        notify()->success('Đã thêm sản phẩm vào giỏ hàng','Giỏ hàng');
        return redirect()->back();
    }
    public function deleteItemInCart(Request $request){

        $userId = Auth::user()->id;
        $checkCart = invoices::checkCart($userId)->First();
        $checkItemInvoice = invoice_details::CheckProductInCart($checkCart->id,$request->id)->first();
        $checkItemInvoice->delete();
        notify()->success('Đã xóa sản phẩm khỏi giỏ hàng','Giỏ hàng');
        return redirect()->back();
    }
    public function UpdateItemInCart(Request $request){
        $userId = Auth::user()->id;
        $checkCart = invoices::checkCart($userId)->First();
        $checkItemInvoice = invoice_details::CheckProductInCart($checkCart->id,$request->id)->get();
        // kiểm tra sản phẩm đã có trong hóa đơn chưa
            $checkItemInvoice = invoice_details::CheckProductInCart($checkCart->id,$request->id)->first();
            invoice_details::where('id', $checkItemInvoice->id)->update([
                'quantity' => $request->quantity,
            ]);
        return redirect()->back();
    }
    public function category(){
        return view('category');
    }
}
