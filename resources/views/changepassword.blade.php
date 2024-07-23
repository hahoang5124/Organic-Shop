@extends('layout')
@section('title','Welcome To HNA SHOP')
@section('content')
<section class="signup">
            <div class="containerlogin">
                <div class="signin-content">
                    <div class="w-25">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Đổi mật khẩu</h2>
                        <form method="POST" action="{{route('processchangepassword',$token)}}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label class="h-75" for="your_name"></label>
                                <input type="password" name="password" id="your_name" placeholder="Mật khẩu"/>
                                @if ($errors->has('password'))
                                    <smail class="text-danger">{{ $errors->first('password') }}</smail>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="h-75" for="your_name"></label>
                                <input type="password" name="password_confirmation" id="your_name" placeholder="Nhập lại mật khẩu"/>
                                @if ($errors->has('password_confirmation'))
                                    <smail class="text-danger">{{ $errors->first('password_confirmation') }}</smail>
                                @endif
                            </div>
                            <div class="form-group form-button">
                                <button class="form-submit border-0">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection