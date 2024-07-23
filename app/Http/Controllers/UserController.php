<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function processLogin(Request $request){
        $user = $request->only('email','password');
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8'
        ]);
        if ($validator->fails()) {
            notify()->error('Đăng nhập thất bại','Đăng nhập');
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        if (Auth::attempt($user)) {
            // Xác thực thành công, chuyển hướng đến dashboard
            notify()->success('Đăng nhập thành công','Đăng nhập');
            return redirect()->intended('/');
        }
           // Xác thực thất bại, quay lại trang đăng nhập với thông báo lỗi
           notify()->error('Tài khoản hoặc mật khẩu không chính xác','Đăng nhập');
           return redirect()->back()->withErrors([
            'email' => 'Email không chính xác',
            'password' => 'Mật khẩu không chính xác',
        ]);
    }
    public function processRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password_confirmation' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed'
        ]);
        if ($validator->fails()) {
            notify()->error('Đăng ký thất bại','Đăng ký');
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        notify()->success('Đăng ký thành công','Đăng ký');
        return redirect()->route('login');
    }
    public function register(){
        return view('register');
    }
    public function  logOut(){
        Auth::logout();
        notify()->success('Đăng xuất thành công','Đăng xuất');
        return redirect()->route('login');
    }
    public function  userInfo(){
        return view('userinfo');
    }
    public function  resetPassword(){
        return view('resetpassword');
    }
    public function  processSendMail(Request $request){
        $token = Str::random(20);
        User::updateUserToken($token,$request->email);
        $details = [
            'title' => 'Mail from Laravel',
            'body' => 'This is a test email from Laravel application.',
            'token' => $token
        ];

        Mail::to($request->email)->send(new SendMail($details));
        return redirect()->route('home');
    }
    public function  changePassword(Request $request){
        $token = $request->token;
        return view('changepassword',compact('token'));
    }
    public function  processChangePassword(Request $request){
        $token = $request->token;
        $user = User::getUserByToken($token)->first();
        if($user == null){
            notify()->error('Không tìm thấy tài khoản của bạn','Lỗi');
            return redirect()->route('resetpassword');
        }
        if($user->reset_token_expires_at <= now()->setTimezone('Asia/Ho_Chi_Minh')){
            notify()->error('Yêu cầu lấy lại mật khẩu của bạn đã hết hạn','Hết hạn');
            return redirect()->route('resetpassword');
        }
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8'
        ]);
        if ($validator->fails()) {
            notify()->error('Đổi mật khẩu thất bại','Đổi mật khẩu');
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        $password = bcrypt($request->password);
        User::changeUserPassword($token,$password);
        return redirect()->route('home')->with('success', 'Email Sent.');
    }
}
