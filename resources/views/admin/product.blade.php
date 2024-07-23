@extends('adminLayout')
@section('title','HNA SHOP ADMIN')
@section('content')
<div class="container mt-5">
@include('notify::components.notify')
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $item)
                  <tr>
                    <td><img src="{{asset('storage/'.$item->img)}}" width="50px" alt=""></td>
                    <td class="tm-product-name">{{$item->productName}}</td>
                    <td>{{number_format($item->price,0,'.')}} VNĐ</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->categoryName}}</td>
                    <td>
                      <form method="post" action="{{route('deleteproduct',$item->id)}}">
                      @csrf
                      @method('DELETE')

                      <button class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </button>
                      </form>
                    </td>
                    <td>
                      <a href="{{route('editproduct',$item->id)}}" class="tm-product-delete-link">
                      <i class="fa-solid fa-pen fa-lg" style="color: #f7f7f7;"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="{{route('addproduct')}}" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Danh mục</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                  @foreach ($category as $item)
                    <tr>
                      <td class="tm-product-name">{{$item->name}}</td>
                      <td class="text-center">
                        <a href="#" class="tm-product-delete-link">
                          <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button>
          </div>
        </div>
      </div>
    </div>
@endsection