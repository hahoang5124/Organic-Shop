@extends('layout')
@section('title','Welcome To HNA SHOP')
@section('content')
<section class="signup">
            <div class="containerlogin">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form method="POST" action="{{route('processlogin')}}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label class="h-75" for="your_name"></label>
                                <input type="email" name="email" id="your_name" placeholder="Email"/>
                                @if ($errors->has('email'))
                                    <smail class="text-danger">{{ $errors->first('email') }}</smail>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="h-75" for="your_pass"></label>
                                <input type="password" name="password" id="your_pass" placeholder="Mật khẩu"/>
                                @if ($errors->has('password'))
                                    <smail class="text-danger">{{ $errors->first('password') }}</smail>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Lưu mật khẩu</label>
                                <div>Bạn chưa có tài khoản ? <strong><a href="{{ route('register') }}">Đăng ký ngay</a></strong></div>
                            </div>
                            <div class="form-group form-button">
                                <button class="form-submit border-0">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection