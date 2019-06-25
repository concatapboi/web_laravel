<?php

namespace App\Http\Modules\Backend\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend::trangchu');
    }

    public function login(){
        return view('Backend::login');
    }
    public function postLogin(Request $req){
        $this->validate($req,[
            'password'=> 'required|min:5|max:10',
            'username'=> 'required'

        ],
        [
            'username.required'=> 'Vui lòng nhập tên đăng nhập',
            'password.required'=> 'Nhập lại mật khẩu',
            'password.min'=> 'Mật khẩu có ít nhất 5 ký tự',
            'password.max'=> 'Mật khẩu nhỏ hơn 10 ký tự'
        ]);
        $arr = array('username'=>$req->username,'password'=>$req->password);
        if(Auth::guard('admin')->attempt($arr)){
            return redirect()->route('trang-chu-admin');
        }else return redirect()->back()->with(['thongbao'=>'Đăng nhập thất bại']);
    }
}
