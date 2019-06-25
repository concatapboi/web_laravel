<?php

namespace App\Modules\Frontend\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\CatalogDetail;
use App\Models\Goods;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\CartData;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::simplePaginate(12);
        return view('Frontend::trangchu',compact('goods'));
    }
    public function dssanpham()
    {
        $goods = Goods::simplePaginate(12);
        return view('Frontend::sanpham',compact('goods'));
    }
    public function sanpham($slug,$key)
    {
        $goods = Goods::where('catalog_id',$key)->simplePaginate(12);
        return view('Frontend::sanpham',compact('goods'));
    }
    public function infoSanpham($slug,$key)
    {
        $infoPro = Goods::find($key);
        $relativePro = Goods::where('catalog_detail_id',$infoPro->catalog_detail_id)->simplePaginate(5);
        $catalog = Catalog::find($infoPro->catalog_id);
        $catDetail = CatalogDetail::find($infoPro->catalog_detail_id);
        return view('Frontend::sanpham-info',compact('infoPro','catalog','catDetail','relativePro'));
    }
    public function sanphamdetailitem($slug,$key)
    {
        $goods = Goods::where('catalog_detail_id',$key)->simplePaginate(12);
        return view('Frontend::sanpham',compact('goods'));
    }
    public function dssanphamlist()
    {
        $goods = Goods::simplePaginate(12);
        return view('Frontend::sanpham-list',compact('goods'));
    }
     public function sanphamdetail()
    {
        $catalog = Catalog::all();
        return view('Frontend::sanpham-detail',compact('catalog'));
    }
    public function cart()
    {
        if(Auth::check())
        return view('Frontend::cart',compact('catalog'));
        return redirect()->route('dang-nhap');
    }
    public function lienhe()
    {
        return view('Frontend::lienhe',compact('catalog'));
    }
    public function login()
    {
        return view('Frontend::login');
    }
    public function postLogin(Request $req)
    {
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
        }else
        if(Auth::attempt($arr)){
            $userId = Auth::user()->id;      
            $cartDataInfo = CartData::where('user_id', $userId)->get();    
            $cartDataInfo->toArray(); 
            if(isset($cartDataInfo['0']->user_id)){
                $oldCart = Session::get('cart')?Session::get('cart'):null;
                $cart = new Cart($oldCart);
                foreach ($cartDataInfo as $key => $value) {                
                    $id = $value['goods_id'];                
                    $product = Goods::find($id);                    
                    $cart->addHasAmounts($product,$id,$cartDataInfo[$key]->amounts);
                }
                $req->session()->put('cart',$cart);                
            }
            $req->session()->put('login',$arr);
            if(Session::get('checkout')==1){
                return redirect()->route('thong-tin-tai-khoan'); }
            return redirect()->route('trang-chu');
        }else return redirect()->back()->with(['thongbao'=>'Đăng nhập thất bại']);
    }
    public function getLogout(Request $req)
    {
        $oldCart = Session::get('cart')?Session::get('cart'):null;        
        if($oldCart!=null){
            $username = Auth::user()->username;  
            $userId = Auth::user()->id;    
            $userInfo = User::where('username',$username)->first();                     
            $itemsArr = array();
            $itemsArr = $oldCart->getAllItems();
            $cartDataInfo = CartData::where('user_id', $userId)->get();    
            $cartDataInfo->toArray();
            if(isset($cartDataInfo['0']->user_id)){
                $cartDataInfo= CartData::where('user_id',$userId)->delete(); 
            }
            foreach ($itemsArr as $key => $value) {
                $cart = new CartData();
                $products = new Goods();                
                $products = $value['item'];
                $cart->user_id = $userInfo->id;
                $cart->goods_id = $products->id;
                $cart->amounts = $value['amounts'];
                $cart->save();
            }
            $req->session()->put('cart',null);            
        }
        $req->session()->put('login',null);
        Auth::logout();        
        return redirect()->route('trang-chu');
    }
    public function register()
    {
        return view('Frontend::register');
    }
    public function postRegister(Request $req)
    {
        $this->validate($req,[
            'email'=> 'required|email|unique:user,email',
            'password'=> 'required|min:5|max:10',
            'name'=> 'required',
            'username'=> 'required|unique:user,username',
            'confirm'=> 'required|same:password',
            'telephone'=> 'required|min:10||max:11',
            'address' => 'required'
        ],
        [
            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Không đúng định dạng emal',
            'email.unique'=>'Email đã có người sử dụng',
            'name.required'=> 'Vui lòng nhập tên',
            'username.required'=> 'Vui lòng nhập tên đăng nhập',
            'username.unique'=>'Tên đăng nhập đã có người sử dụng',
            'password.required'=> 'Vui lòng nhập mật khẩu',
            'confirm.same'=> 'Mật khẩu không giống nhau',
            'confirm.required'=> 'Vui lòng không để trống ô nhập lại mật khẩu',
            'password.min'=> 'Mật khẩu có ít nhất 5 ký tự',
            'password.max'=> 'Mật khẩu nhỏ hơn 10 ký tự',
            'telephone.min'=> 'Số điện thoại có ít nhất 10 số',
            'telephone.required'=> 'Chưa nhập số điện thoại',
            'telephone.max'=> 'Số điện thoại có nhiều nhất 11 số',
            'address.required' =>'Vui lòng nhập địa chỉ'
        ]);
        $user = new User();
        $user->username = $req->username;
        $user->name = $req->name;
        $user->password = Hash::make($req->password);
        $user->email = $req->email;
        $user->phone = $req->telephone;
        $user->address = $req->address;
        $arr = array('username'=>$req->username);
        $user->save();
        return redirect()->route('dang-nhap');
    }
    public function checkout(Request $req){
        if(Session::has('login')){
            $req->session()->put('checkout',0);
            $bill = Bill::where('user_id',Auth::user()->id)->get();
            $billDetail = BillDetail::all();
            $products = Goods::all();
        return view('Frontend::checkout',['bill'=>$bill,'products'=>$products,'billDetail'=>$billDetail]);
        }else {
            $req->session()->put('checkout',1);
            return redirect()->route('dang-nhap');  
        }      
    }
    public function cancelBill($id)
    {
        $bill =Bill::find($id);
        $bill->status = 2;
        $bill->update();
        return redirect()->back()->with(['cancel'=>'Đã hủy đơn hàng mã '.$id]);
    }
    public function cleanCart(Request $req){
        $req->session()->put('cart',null);
        return redirect()->back();
    }
    public function addtocart(Request $req,$id)
    {
        $product = Goods::find($id);
        $oldCart = Session::get('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function addAmountstocart(Request $req,$id)
    {
        $amounts  = $req->amounts;
        $product = Goods::find($id);
        $oldCart = Session::get('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addHasAmounts($product,$id,$amounts);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function removefromcart(Request $req,$id)
    {
        $oldCart = Session::get('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeProduct($id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function dathang(Request $req){
        $this->validate($req,[
            'name' => 'required',
            'phone' => 'required|min:10|max:11',
            'address' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên người nhận',
            'phone.required' => 'Nhập số điện thoại để liên lạc',
            'phone.min' => 'Sai định dạng số điện thoại',
            'phone.max' => 'Sai định dạng số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ người nhận'
        ]);
        $user = User::find(Auth::user()->id);
        $cart = Session::get('cart');

        $bill = new Bill();
        $bill->status = -1;
        $bill->user_id = $user->id;
        $bill->user_name = $user->username;
        $bill->name = $req->name;
        $bill->address = $req->address;
        $bill->user_email = $user->email;
        $bill->user_phone = $user->phone;
        $bill->price = $cart->cost;
        $bill->save();

        foreach ($cart['item'] as $key => $value) {
            $billDetail = new BillDetail();
            $billDetail->bill_id = $bill->id;
            $billDetail->goods_id = $key;
            $billDetail->amounts = $value['amounts'];
            $billDetail->price = $value['price'];
            $billDetail->save();
        }
        $cartDataInfo= CartData::where('user_id',Auth::user()->id)->delete();
        $req->session()->put('cart',null);
        return redirect()->route('thong-tin-tai-khoan');
    }
    public function updateUserInfo(Request $req, $id){
        $oldUser = User::find($id);        
        if(Hash::check($req->password,$oldUser->password)){
            $this->validate($req,[
                'name'=>'required',
                'email'=>'required|email',
                'phone'=>'required|min:10|max:11',
                'newpassword'=>'required|min:5|max:10',
                'renewpassword'=>'required|same:newpassword',
            ],[
                'name.required'=>'Vui lòng nhập tên',                
                'phone.min'=> 'Số điện thoại có ít nhất 10 số',
                'phone.required'=> 'Chưa nhập số điện thoại',
                'phone.max'=> 'Số điện thoại có nhiều nhất 11 số',
                'newpassword.required'=> 'Vui lòng nhập mật khẩu mới',
                'renewpassword.same'=> 'Mật khẩu mới không giống nhau',
                'renewpassword.required'=> 'Vui lòng không để trống ô nhập lại mật khẩu mới',
                'newpassword.min'=> 'Mật khẩu có ít nhất 5 ký tự',
                'newpassword.max'=> 'Mật khẩu nhỏ hơn 10 ký tự'
            ]);
            if($req->email != $oldUser->email){
                $this->validate($req,[
                    'email'=>'required|email|unique:user,email'
                ],[
                    'email.required'=>'Vui lòng nhập email',
                    'email.email'=>'Không đúng định dạng email',
                    'email.unique'=>'Email đã có người sử dụng'
                ]);
                $oldUser->email = $req->email;
            }
                $oldUser->name = $req->name;
                $oldUser->address = $req->address;                
                $oldUser->password = Hash::make($req->newpassword);
                $oldUser->phone = $req->phone;
                $oldUser->remember_token ="";
                $oldUser->update();
                return redirect()->back()->with(['thongbao'=>'Đổi thông tin thành công']);
        } else return redirect()->back()->with(['thongbao'=>'Mật khẩu không đúng']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
