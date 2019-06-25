<?php

namespace App\Modules\Backend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Goods;
use App\Models\CatalogDetail;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;
use Auth;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax($catID)
    {
        $catDetail = CatalogDetail::where('catalog_id',$catID)->get();
        foreach ($catDetail as $cd) {
            echo "<option value='".$cd->id."'>".$cd->id."-".$cd->name."</option>";
        }
    }
    public function index()
    {
        $catalog = Catalog::all();
        $cat_detail = CatalogDetail::all();
        $user = User::all();
        $products = Goods::all();
        $bill = Bill::all();
        return view('Backend::trangchu',['catalog'=>$catalog,'cat_detail'=>$cat_detail,'user'=>$user,'products'=>$products,'bill'=>$bill]);
    }
    public function delNSX($id){
        if(CatalogDetail::where('catalog_id',$id)->first())
            return redirect()->back()->with(['color'=>'red','thongbao1'=>'Không thể xóa dữ liệu có mã ID '.$id.' ! Lỗi: khóa chính']);
        $catalog = Catalog::find($id);
        $catalog->delete();
        return redirect()->back()->with(['color'=>'green','thongbao1'=>'Xóa dữ liệu có mã ID '.$id.' thành công! Lỗi: 0']);         
        
    }
    public function delDM($id){
        if(Goods::where('catalog_detail_id',$id)->first())
            return redirect()->back()->with(['color'=>'red','thongbao2'=>'Không thể xóa dữ liệu có mã ID '.$id.' ! Lỗi: khóa chính']);
        $catDetail = CatalogDetail::find($id);
        $catDetail->delete();
        return redirect()->back()->with(['color'=>'green','thongbao2'=>'Xóa dữ liệu có mã ID '.$id.' thành công! Lỗi: 0']);    
        
    }
    public function delSP($id){
        if(BillDetail::where('goods_id',$id)->first())
            return redirect()->back()->with(['color'=>'red','thongbao3'=>'Không thể xóa dữ liệu có mã ID '.$id.' ! Lỗi: khóa chính']);
        $good = Goods::find($id);
        $good->delete();
        return redirect()->back()->with(['color'=>'green','thongbao3'=>'Xóa dữ liệu có mã ID '.$id.' thành công! Lỗi: 0']);        
        
    }
    public function delBill($id){
        $bill = Bill::find($id);
        if($bill->status ==0)
            return redirect()->back()->with(['color'=>'red','thongbao5'=>'Không thể xóa dữ liệu có mã ID '.$id.' ! Lỗi: khóa chính']);
        else {
        BillDetail::where('bill_id',$id)->delete();        
        $bill->delete();
        return redirect()->back()->with(['color'=>'green','thongbao5'=>'Xóa dữ liệu có mã ID '.$id.' thành công! Lỗi: 0']);   }   
        
    }
    public function delUser($id){
        if(Bill::where('user_id',$id)->first());    
            return redirect()->back()->with(['color'=>'red','thongbao4'=>'Không thể xóa dữ liệu có mã ID '.$id.' ! Lỗi: khóa chính']);
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with(['color'=>'green','thongbao4'=>'Xóa dữ liệu có mã ID '.$id.' thành công! Lỗi: 0']);        
        
    }
    public function getLogin(){
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
    public function logout(Request $req)
    {   
        Auth::guard('admin')->logout();
        return view('Backend::login');
    }
    public function qlAction($no){
        return view('Backend::catalog-action')->with(['action'=>$no,'catalog'=>$catalog]);
    }
    public function qlUserInfo($userID){
        $user = User::find($userID);
        return view('Backend::user-action',['user'=>$user]);

    }
    public function xulyUser(Request $req)
    {
        $this->validate($req,[            
            'name' => 'required',            
            'phone' => 'required',
            'address' => 'required'
        ],[
            'name.required'=> 'Vui lòng nhập tên',                        
            'phone.required'=> 'Chưa nhập số điện thoại',
            'address.required' =>'Vui lòng nhập địa chỉ'
        ]);
        $user = User::find($req->id);
        if($user->username !=$user->username){
            $this->validate($req,[
                'username' => 'required|unique:user,username'
            ],[
                'username.required'=> 'Vui lòng nhập tên đăng nhập',
                'username.unique'=>'Tên đăng nhập đã có người sử dụng'
            ]);
        }
        if($user->email!=$req->email){
            $this->validate($req,[
                'email' => 'required|email|unique:user,email'
            ],[
                'email.required'=> 'Vui lòng nhập email',
                'email.email'=> 'Không đúng định dạng emal',
                'email.unique'=>'Email đã có người sử dụng'
            ]);
        }        
        $user->user = $req->username;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->update();
        return redirect()->back()->with(['xuly'=>'Đã cập nhật khách hàng có ID '.($req->id)]);
    }
    public function qlBill($id){
        $bill = Bill::find($id);
        switch ($bill->status) {
            case -1:
                $bill->status = 0;
                $bill->update();
                return redirect()->back()->with(['color'=>'green','thongbao5'=>'Đã cập nhật đơn hàng có ID '.($bill->id)]);
            case 0:
                $bill->status = 1;
                $bill->update();
                return redirect()->back()->with(['color'=>'green','thongbao5'=>'Đã cập nhật đơn hàng có ID '.($bill->id)]);
        }
    }
    public function qlBillDetailInfo($id){
        if($id > 0){
            $bill = Bill::find($id);
            $billDetail = BillDetail::where('bill_id',$id)->get();
        }
        else {
            $billDetail = BillDetail::all();
            $bill = Bill::all();
        }
        return view('Backend::bill-detail-action',['bill'=> $bill,'billDetail'=>$billDetail,'check'=>$id]);     
    }
    public function qlProInfo($id){
        if($id==-1){
            $product = Goods::first();            
        }else $product = Goods::find($id);
        $cat = Catalog::all();        
        $catDetail = CatalogDetail::all();
        return view('Backend::products-action',['action'=>$id,'product'=>$product,'cat'=>$cat,'catDetail'=>$catDetail]);
    }
    public function xulyProduct(Request $req)
    {
        $this->validate($req,[
            'name'=>'required',
            'price' => 'required',
            'img'=>'required'
        ],[
            'name.required' => "Vui lòng nhập tên sản phẩm",
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'img.required' => 'Vui lòng chọn file hình'
        ]);
        if(isset($req->id)){
            $product = Goods::find($req->id);
            if($product->name != $req->name){
                $this->validate($req,[
                    'name'=> 'unique:goods,name'
                ],[
                    'name.unique' => 'Tên sản phẩm đã tồn tại'
                ]);
            }
        }
        $this->validate($req,[
                'name'=> 'unique:goods,name'
        ],[
               'name.unique' => 'Sản phẩm đã tồn tại'
        ]);
        $newproduct = new Goods();
        $newproduct->name = $req->name;
        $newproduct->catalog_id = $req->catalog_id;
        $newproduct->catalog_detail_id = $req->catdetail_id;
        $hinh = $req->file('img');        
        $name =$hinh->getClientOriginalName();
        $temp = $hinh->getClientOriginalExtension();
        if($temp!= 'png') return redirect()->back()->with(['xuly'=>'Định dạng khác .png']);
        $newproduct->img_link = '/image/product/'.$name;
        $newproduct->price = $req->price;
        $newproduct->discount = $req->discount;
        $newproduct->amounts = $req->amounts;
        if(!$hinh->move('image/product/',$name) )
            return redirect()->back()->with(['xuly'=>'Lỗi lưu hình']);  
        $newproduct->save();
        return redirect()->back()->with(['xuly'=>'Đã thêm sản phẩm có ID '.($newproduct->id)]);
    }
    public function qlCatalogInfo($id){
        if($id==-1){
            $catalog = Catalog::first();
        }
        else $catalog = Catalog::find($id);
        return view('Backend::catalog-action',['action'=>$id,'catalog'=>$catalog]);
    }
    public function xulyCat(Request $req){
        $this->validate($req,[
            'name'=>'required|unique:catalog,name'
        ],[
            'name.required'=>'Vui lòng nhập tên nhà sản xuất'
        ]);
        if(isset($req->id)){
            $cat = Catalog::find($req->id);
            if($cat->name != $req->name){
                $this->validate($req,[
                    'name'=>'unique:catalog,name'
                ],[
                    'name.unique' =>'Tên nhà sản xuất đã tồn tại'
                ]);
            }
            $cat->name = $req->name;
            $cat->update();
            return redirect()->back()->with(['xuly'=>'Đã đổi tên nhà sản xuất có ID '.($req->id).' thành '.($req->name)]);
        }
        $this->validate($req,[
            'name'=>'unique:catalog,name'
        ],[
            'name.unique' =>'Nhà sản xuất đã tồn tại'
        ]);
        $newcat = new Catalog();
        $newcat->name = $req->name;
        if(Catalog::where('name',$newcat->name)->first()) return redirect()->back()->with(['xuly'=>'Đã tồn tại nhà sản xuất '.($req->name)]);
        $newcat->save();
        return redirect()->back()->with(['xuly'=>'Đã thêm nhà sản xuất '.($req->name)]);
    }
    public function qlCatalogDetailInfo($id){
        if($id==-1){
            $catDetail = CatalogDetail::first();            
        }else{
            $catDetail = CatalogDetail::find($id);            
        }
        $cat = Catalog::all();
        return view('Backend::cat-detail-action',['action'=>$id,'catDetail'=>$catDetail,'cat'=>$cat]);
    }
    public function xulyCatDetail(Request $req){
        $this->validate($req,[
            'name' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục sản phẩm'
        ]);
        if(isset($req->id)){
            $catDetail = CatalogDetail::find($req->id);
            if($catDetail->name != $req->name){
                $this->validate($req,[
                    'name' => 'unique:catalog_detail,name'
                    ],[
                        'name.unique' => 'Tên danh mục đã tồn tại'
                ]);
            }
            $catDetail->name = $req->name;            
            $catDetail->catalog_id = $req->catalog_id;
            $catDetail->update();
            return redirect()->back()->with(['xuly'=>'Đã đổi tên danh mục có ID '.($req->id).' thành '.($req->name)]);
        }
        $this->validate($req,[
            'name' => 'unique:catalog_detail,name'
        ],[
            'name.unique' => 'Đã tồn tại danh mục'
        ]);
        $newcatDetail = new CatalogDetail();
        $newcatDetail->name = $req->name;
        $newcatDetail->catalog_id = $req->catalog_id;
        if(Catalog::where('name',$newcatDetail->name)->first()) return redirect()->back()->with(['xuly'=>'Đã tồn tại danh mục '.($req->name)]);
        $newcatDetail->save();
        return redirect()->back()->with(['xuly'=>'Đã thêm danh mục '.($req->name)]);
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
