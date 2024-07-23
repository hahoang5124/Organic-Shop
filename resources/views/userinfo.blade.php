@extends('layout')
@section('title','Welcome To HNA SHOP')
@section('content')
<div class="container container-userinfo">
<div class="main-body">
<div class="row gutters-sm">
<div class="col-md-4 mb-3">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">
<img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="Admin" class="rounded-circle" width="150">
<div class="mt-3">
<h4>{{Auth::user()->name}}</h4>
<p class="text-secondary mb-1">Developer</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-8">
<div class="card mb-3">
<div class="card-body">
<div class="row">
<div class="col-sm-3 py-2">
<h6 class="mt-1">Tên tài khoản</h6>
</div>
<div class="col-sm-9 py-2">
{{Auth::user()->name}}
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3 py-2">
<h6 class="mb-0 mt-1">Email</h6>
</div>
<div class="col-sm-9 py-2 text-secondary">
{{Auth::user()->email}}
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3 py-2">
<h6 class="mb-0 mt-1">Số điện thoại</h6>
</div>
<div class="col-sm-9 py-2 text-secondary">
{{Auth::user()->phonenumber}}
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3 py-2">
<h6 class="mb-0 mt-1">Địa chỉ</h6>
</div>
<div class="col-sm-9 text-secondary py-2">
{{Auth::user()->address}}
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-12 pt-3">
<a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Cập nhật</a>
<a class="btn btn-outline-dark mx-2" href="{{ route('logout') }}">Đăng xuất</a>
@if (Auth::user()->role == 1)
<a class="btn btn-outline-warning " href="{{ route('admin') }}">Trang quản trị</a>
@endif
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection