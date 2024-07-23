@extends('adminLayout')
@section('title','HNA SHOP ADMIN')
@section('content')
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Thêm sản phẩm</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <!-- THÊM SẢN PHẨM -->
              @if(!isset($id))
                <div class="col-xl-8 col-lg-6 col-md-12">
                  <form action="{{route('createproduct')}}" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                    @csrf
                    <div class="form-group mb-3">
                      <label
                        for="name"
                        >Tên sản phẩm
                      </label>
                      <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control validate"
                        required
                      />
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="gia"
                              >Giá
                            </label>
                            <input
                              id="gia"
                              name="price"
                              type="text"
                              class="form-control validate"
                            />
                          </div>
                          <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="quantity"
                              >Số lượng
                            </label>
                            <input
                              id="quantity"
                              name="quantity"
                              type="text"
                              class="form-control validate"
                              required
                            />
                          </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="pricesale"
                              >Giá khuyến mãi
                            </label>
                            <input
                              id="pricesale"
                              name="pricesale"
                              type="text"
                              class="form-control validate"
                            />
                          </div>
                          <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="percentsale"
                              >Phần trăm khuyến mãi
                            </label>
                            <input
                              id="percentsale"
                              name="percentsale"
                              type="text"
                              class="form-control validate"
                            />
                          </div>
                    </div>
                    <div class="form-group mb-3">
                      <label
                        for="description"
                        >Mô tả</label
                      >
                      <textarea
                        class="form-control validate"
                        rows="3"
                        name="description"
                        required
                      ></textarea>
                    </div>
                    <div class="form-group mb-3">
                      <label
                        for="category"
                        >Danh mục</label
                      >
                      <select
                        class="custom-select tm-select-accounts"
                        id="category"
                        name="categoryid"
                      >
                        <option  selected>Chọn danh mục</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 mx-auto mb-4">
                <h6 class="text-light">Ảnh sản phẩm</h6>
                <img class="img-fluid" 
                src=""
                >
                <div class="custom-file mt-3 mb-3">
                  <input name="img" id="fileInput" type="file" />
                </div>
              </div>
              <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block text-uppercase">Thêm sản phẩm</button>
              </div>
            </form>
            </div>
              @else
              <!-- CẬP NHẬT SẢN PHẨM -->
                <div class="col-xl-8 col-lg-6 col-md-12">
                  <form action="{{route('updateproduct',$id)}}" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                      <label
                        for="name"
                        >Tên sản phẩm
                      </label>
                      <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control validate"
                        value="{{$product->name}}"
                        required
                      />
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="gia"
                              >Giá
                            </label>
                            <input
                              id="gia"
                              name="price"
                              type="text"
                              class="form-control validate"
                              value="{{$product->price}}"
                            />
                          </div>
                          <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="quantity"
                              >Số lượng
                            </label>
                            <input
                              id="quantity"
                              name="quantity"
                              type="text"
                              class="form-control validate"
                              value="{{$product->quantity}}"
                              required
                            />
                          </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="pricesale"
                              >Giá khuyến mãi
                            </label>
                            <input
                              id="pricesale"
                              name="pricesale"
                              type="text"
                              class="form-control validate"
                              value="{{$product->pricesale}}"
                            />
                          </div>
                          <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                              for="percentsale"
                              >Phần trăm khuyến mãi
                            </label>
                            <input
                              id="percentsale"
                              name="percentsale"
                              type="text"
                              class="form-control validate"
                              value="{{$product->percentsale}}"
                            />
                          </div>
                    </div>
                    <div class="form-group mb-3">
                      <label
                        for="description"
                        >Mô tả</label
                      >
                      <textarea
                        class="form-control validate"
                        rows="3"
                        name="description"
                        required
                      >{{$product->description}}"</textarea>
                    </div>
                    <div class="form-group mb-3">
                      <label
                        for="category"
                        >Danh mục</label
                      >
                      <select
                        class="custom-select tm-select-accounts"
                        id="category"
                        name="categoryid"
                      >
                        @foreach ($category as $item)
                        <option {{ ($item->id == $product->categoryid) ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 mx-auto mb-4">
                <h6 class="text-light">Ảnh sản phẩm</h6>
                <img class="img-fluid" 
                src="{{(!isset($id) ? '' : asset('storage/'. $product->img))}}"
                >
                <div class="custom-file mt-3 mb-3">
                  <input name="img" id="fileInput" type="file" />
                </div>
              </div>
              <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block text-uppercase">Cập nhật sản phẩm</button>
              </div>
              @endif
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection