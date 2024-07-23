<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('home');
});
Route::get('/products', function () {
    return view('product');
}); */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/product', [ProductController::class, 'list'])->name('products');
Route::get('/search{keyword}', [ProductController::class, 'search'])->name('search');
Route::get('/productDetail/{id}', [ProductController::class, 'detail'])->name('productDetail');
Route::get('/product/{id}', [ProductController::class, 'listByCategory'])->name('productsBycategory');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/addToCart', [ProductController::class, 'addToCart'])->name('addToCart');
Route::post('/deletecart', [ProductController::class, 'deleteItemInCart'])->name('deletecart');
Route::get('/category', [ProductController::class, 'category'])->name('category');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/processlogin', [UserController::class, 'processLogin'])->name('processlogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/userinfo', [UserController::class, 'userInfo'])->name('userinfo');
Route::get('/logout', [UserController::class, 'logOut'])->name('logout');
Route::post('/processregister', [UserController::class, 'processRegister'])->name('processregister');
Route::get('/resetpassword', [UserController::class, 'resetPassword'])->name('resetpassword');
Route::post('/sendmail', [UserController::class, 'processSendMail'])->name('sendmail');
Route::get('/changepassword/{token}', [UserController::class, 'changePassword'])->name('changepassword');
Route::post('/processchangepassword/{token}', [UserController::class, 'processChangePassword'])->name('processchangepassword');
//ADMIN
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
Route::get('/adminproduct', [AdminController::class, 'product'])->name('adminproduct');
Route::get('/addproduct', [AdminController::class, 'addProduct'])->name('addproduct');
Route::post('/createproduct', [AdminController::class, 'createProduct'])->name('createproduct');
Route::get('/editproduct/{id}', [AdminController::class, 'editProduct'])->name('editproduct');
Route::put('/updateproduct/{id}', [AdminController::class, 'updateProduct'])->name('updateproduct');
Route::delete('/deleteproduct/{id}', [AdminController::class, 'deleteProduct'])->name('deleteproduct');
Route::get('/adminuser', [AdminController::class, 'user'])->name('adminuser');




