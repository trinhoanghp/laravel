<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {   
        return view('admin.index');
    }
    public function login()
    {   
        // dd(bcrypt(123456));`
        return view('admin.login');

    }
    public function check_login(Request $req)
    {
    $data = $req->only('name','password');
    
    $check_login = auth()->attempt($data,$req->has('remember_me'));
    // dd($check_login);
    if($check_login)
    {
    return redirect()->route('admin.index')->with('success','Chào mừng bạn đã quay trở lại' );
    
    }
    return redirect()->back()->with('error','Đăng nhập thất bại');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('success','Thoát thành công');
    }
   
}