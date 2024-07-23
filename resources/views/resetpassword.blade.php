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
                        <h2 class="form-title">Quên mật khẩu</h2>
                        <form method="POST" action="{{route('sendmail')}}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label class="h-75" for="your_name"></label>
                                <input type="email" name="email" id="your_name" placeholder="Email"/>
                                @if ($errors->has('email'))
                                    <smail class="text-danger">{{ $errors->first('email') }}</smail>
                                @endif
                            </div>
                            <div class="form-group form-button">
                                <button class="form-submit border-0">Quên mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection