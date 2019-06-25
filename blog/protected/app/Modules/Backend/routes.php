<?php
$namespace = 'App\Modules\Backend\Controllers';
Route::group(['middleware'=>['web'],'module'=>'Backend','namespace'=>$namespace], function(){
    Route::get('/',[
    	'as' => 'trang-chu-admin',
    	'uses' => 'PageController@index'
    ]);
    // Route::get('/login',[
    // 	'as' => 'login-admin',
    // 	'uses' => 'PageController@getLogin'
    // ]);
    // Route::post('/login',[
    // 	'as' => 'login-admin',
    // 	'uses' => 'PageController@postLogin'
    // ]);
    Route::get('ajax-cat-detail/{id}','PageController@ajax');
    Route::get('/dang-xuat',[
        'as' => 'dang-xuat-admin',
        'uses' => 'PageController@logout'
    ]);
    Route::get('/catalog',[
        'as' => 'catalog-admin',
        'uses' => 'PageController@qlCatalog'
    ]);
    Route::get('/bill',[
        'as' => 'bill-admin',
        'uses' => 'PageController@qlBill'
    ]);
    Route::get('/goods',[
        'as' => 'goods-admin',
        'uses' => 'PageController@qlGoods'
    ]);
    Route::get('/delete-catalog/{id}',[
        'as' => 'delete-nsx',
        'uses' => 'PageController@delNSX'
    ]);
    Route::get('/delete-catalog-detail/{id}',[
        'as' => 'delete-danhmuc',
        'uses' => 'PageController@delDM'
    ]);
    Route::get('/delete-good/{id}',[
        'as' => 'delete-sp',
        'uses' => 'PageController@delSP'
    ]);
    Route::get('/delete-bill/{id}',[
        'as' => 'delete-bill',
        'uses' => 'PageController@delBill'
    ]);
    Route::get('/delete-user/{id}',[
        'as' => 'delete-user',
        'uses' => 'PageController@delUser'
    ]);
    Route::get('/info-user/{userID}',[
        'as' => 'user-info-admin',
        'uses' => 'PageController@qlUserInfo'
    ]);
    Route::post('/xuly-user',[
        'as' => 'xuly-user',
        'uses' => 'PageController@xulyUser'
    ]);
    Route::get('/info-bill-detail/{billID}',[
        'as' => 'bill-detail-info-admin',
        'uses' => 'PageController@qlBillDetailInfo'
    ]);
    Route::get('/info-catalog/{catID}',[
        'as' => 'catalog-info-admin',
        'uses' => 'PageController@qlCatalogInfo'
    ]);
    Route::get('/info-catalog-detail/{catdetailID}',[
        'as' => 'catalog-detail-info-admin',
        'uses' => 'PageController@qlCatalogDetailInfo'
    ]);
    Route::get('/info-product/{proID}',[
        'as' => 'product-info-admin',
        'uses' => 'PageController@qlProInfo'
    ]);
    Route::get('/action/{number}',[
        'as' => 'page-control',
        'uses' => 'PageController@qlAction'
    ]);
    Route::get('/update-status-bill/{billID}',[
        'as' => 'update-status-bill',
        'uses' => 'PageController@qlBill'
    ]);
    Route::post('/xuly-catalog',[
        'as' => 'xuly-catalog',
        'uses' => 'PageController@xulyCat'
    ]);
    Route::post('/xuly-catalog-detail',[
        'as' => 'xuly-catalog-detail',
        'uses' => 'PageController@xulyCatDetail'
    ]);
    Route::post('/xuly-product',[
        'as' => 'xuly-product',
        'uses' => 'PageController@xulyProduct'
    ]);
	    
}); 
Route::group(['middleware'=>['web'],'module'=>'Backend','namespace'=>$namespace], function(){
    Route::get('/login',[
        'as' => 'login-admin',
        'uses' => 'PageController@getLogin'
    ]);
    Route::post('/login',[
        'as' => 'login-admin',
        'uses' => 'PageController@postLogin'
    ]);
        
}); 