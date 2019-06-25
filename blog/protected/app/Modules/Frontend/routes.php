<?php
$namespace = 'App\Modules\Frontend\Controllers';
Route::group(['middleware' => ['web'],'module'=>'Frontend','namespace'=>$namespace], function(){
    

    Route::get('/', [
    	'as'=>'trang-chu',
    	'uses'=>'PageController@index'
    ]);
    Route::get('/danh-sach-san-pham.html', [
        'as'=>'ds-san-pham',
        'uses'=>'PageController@dssanpham'
    ]);
    Route::get('/dong-san-pham/op-lung-dien-thoai-{slug}{key}.html', [
        'slug' =>'[a-zA-Z-_]+',
        'key' => '[0-9]+',
    	'as'=>'san-pham',
    	'uses'=>'PageController@sanpham'
    ]);
    Route::get('/thong-tin-san-pham/op-lung-dien-thoai-{slug}{key}.html', [
        'slug' =>'[a-z|A-Z|0-9|-|_]+',
        'key' => '[0-9]+',
        'as'=>'san-pham-info',
        'uses'=>'PageController@infoSanpham'
    ]);
    Route::get('/san-pham/op-lung-dien-thoai-{slug}{key}.html', [
        'slug' =>'[a-zA-Z0-9-_]+',
        'key' => '[0-9]+',
        'as'=>'san-pham-detail',
        'uses'=>'PageController@sanphamdetailitem'
    ]);
    Route::get('/ds-san-pham-list.html', [
    	'as'=>'ds-san-pham-list',
    	'uses'=>'PageController@dssanphamlist'
    ]);
    Route::get('/gio-hang.html', [
        'as'=>'gio-hang',
        'uses'=>'PageController@cart'
    ]);
    Route::get('/lien-he.html', [
        'as'=>'lien-he',
        'uses'=>'PageController@lienhe'
    ]);
    Route::get('/dang-nhap.html', [
        'as'=>'dang-nhap',
        'uses'=>'PageController@login'
    ]);
    Route::post('/dang-nhap.html', [
        'as'=>'dang-nhap',
        'uses'=>'PageController@postLogin'
    ]);
    Route::get('/dang-ky-tai-khoan.html', [
        'as'=>'dk-tai-khoan',
        'uses'=>'PageController@register'
    ]);
    Route::post('/dang-ky-tai-khoan.html', [
        'as'=>'dk-tai-khoan',
        'uses'=>'PageController@postRegister'
    ]);
    Route::get('/dang-xuat.html', [
        'as'=>'dang-xuat',
        'uses'=>'PageController@getLogout'
    ]);
    Route::get('/add-to-cart/{id}', [
        'as'=>'add-to-cart',
        'uses'=>'PageController@addtocart'
    ]);
    Route::get('/add-amounts-to-cart/{id}', [
        'as'=>'add-amounts-to-cart',
        'uses'=>'PageController@addAmountstocart'
    ]);
    Route::get('/remove-from-cart/{id}', [
        'as'=>'remove-from-cart',
        'uses'=>'PageController@removefromcart'
    ]);
    Route::get('/clean-cart',[
        'as'=>'clean-cart',
        'uses'=>'PageController@cleanCart'
    ]);
    Route::post('/dat-hang',[
        'as'=>'dat-hang',
        'uses'=>'PageController@dathang'
    ]);
    Route::post('/update-user-info/{id}',[
        'as'=>'update-user-info',
        'uses'=>'PageController@updateUserInfo'
    ]);
    Route::get('checkout',[
        'as'=>'thong-tin-tai-khoan',
        'uses'=>'PageController@checkout'
    ]);
    Route::get('cancel-bill/{id}',[
        'as' => 'cancel-bill',
        'uses' => 'PageController@cancelBill'
    ]);
    
});
Route::group(['middleware' => ['web'],'module'=>'Backend','namespace'=>'App\Modules\Backend\Controllers'], function(){
    Route::get('admin',[
        'as'=>'trang-chu-admin',
        'uses'=>'PageController@index'
    ]);
});