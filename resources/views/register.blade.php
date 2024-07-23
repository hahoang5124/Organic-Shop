@extends('layout')
@section('title','Welcome To HNA SHOP')
@section('content')
<section class="signup">
    <div class="containerlogin">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Đăng ký</h2>
                <form method="POST" action="{{route('processregister')}}" class="register-form" id="register-form">
                @csrf
                    <div class="form-group">
                        <label class="h-75" for="name"></label>
                        <input type="text" name="name" id="name" placeholder="Họ và tên"/>
                        @if ($errors->has('name'))
                            <smail class="text-danger">{{ $errors->first('name') }}</smail>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="h-75" for="email"></label>
                        <input type="email" name="email" id="email" placeholder="Email"/>
                        @if ($errors->has('email'))
                            <smail class="text-danger">{{ $errors->first('email') }}</smail>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="h-75" for="pass"></label>
                        <input type="password" name="password" id="pass" placeholder="mật khẩu"/>
                        @if ($errors->has('password'))
                            <smail class="text-danger">{{ $errors->first('password') }}</smail>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="h-75" for="re-pass"></label>
                        <input type="password" name="password_confirmation" id="re-pass" placeholder="Nhập lại mật khẩu"/>
                        @if ($errors->has('password_confirmation'))
                            <smail class="text-danger">{{ $errors->first('password_confirmation') }}</smail>
                        @endif
                    </div>
                    <div class="form-group">
                    <div>Bạn đã có tài khoản ? <strong><a href="{{ route('login') }}">Đăng nhập ngay</a></strong></div>

                    </div>
                    <button class="border btn btn-success">Đăng ký</button>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
            </div>
        </div>
    </div>
</section>
@endsection