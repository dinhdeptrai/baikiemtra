<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;   
use App\Http\Controllers\BillController;  
use App\Http\Controllers\BannerController;  
use App\Http\Controllers\TypeController; 
use App\Http\Controllers\ContactsController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/type', function () {
    return view('product_type');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contacts', function () {
    return view('contacts');
});
//shopping_cart
Route::get('/sh',[PageController::class, 'showCart'])->name('shopping_cart');
Route::post('/update-cart', [PageController::class, 'updateCart'])->name('update_cart');

Route::post('/getLike/{id}', [PageController::class, 'getLike'])->name('getLike');

Route::get('/tc',[PageController::class, 'index']);
Route::get('/',[PageController::class, 'index'])->name('trangchu.trangchu');
Route::get('ct/{id}',[PageController::class, 'show'])->name('show'); 
Route::get('tc/{id}',[PageController::class, 'producttype'])->name('producttype'); 
Route::get('add-to-cart/{id}',[PageController::class,'addToCart'])->name('banhang.addToCart');

Route::get('del-cart/{id}',[PageController::class,'delCartItem'])->name('banhang.xoagiohang');

Route::get('Checkout',[PageController::class,'getCheckout'])->name('banhang.getdathang');
Route::post('Checkout',[PageController::class,'postCheckout'])->name('banhang.postdathang');


//đăng ký và đăng nhập của khách hàng
Route::get('dangky',[PageController::class,'getSignin'])->name('getsignin');
Route::post('dangky',[PageController::class,'postSignin'])->name('postsignin');

/*------ phần quản trị ----------*/
Route::get('admin/dangnhap',[UserController::class,'getLogin'])->name('admin.getLogin');
Route::post('admin/dangnhap',[UserController::class,'postLogin'])->name('admin.postLogin');
Route::get('admin/dangxuat',[UserController::class,'getLogout']);



Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
   
    Route::group(['prefix'=>'category'],function(){
        // admin/category/danhsach
        Route::get('danhsach',[CategoryController::class,'getCateList'])->name('admin.getCateList');
        // admin/category/them
        Route::get('them',[CategoryController::class,'getCateAdd'])->name('admin.getCateAdd');
        Route::post('them',[CategoryController::class,'postCateAdd'])->name('admin.postCateAdd');
        Route::delete('xoa/{id}',[CategoryController::class,'getCateDelete'])->name('admin.getCateDelete');
        Route::get('sua/{id}',[CategoryController::class,'getCateEdit'])->name('admin.getCateEdit');
        Route::put('sua/{id}',[CategoryController::class,'postCateEdit'])->name('admin.postCateEdit');
    });
    Route::group(['prefix'=>'bill'],function(){
            Route::get('danhsachbill',[BillController::class,'listBillAll'])->name('admin.listBillAll');
            // admin/bill/{status}
            Route::get('{status}',[BillController::class,'getBillList'])->name('admin.getBillList');
            //phần bill này không nhất thiết phải dùng request ajax, làm như những hàm bình thường, phần route này cô vẫn để lại để tham khảo
            //by laravel request
            Route::get('{id}/{status}',[BillController::class,'updateBillStatus'])->name('admin.updateBillStatus');
            //by ajax request
            Route::post('updatebill/{id}', [BillController::class, 'updateBillStatusAjax'])->name('admin.updateBillStatusAjax');
           
            Route::delete('deletebill/{id}',[BillController::class,'cancelBill'])->name('admin.cancelBill');
        });
        Route::group(['prefix'=>'quanlyuser'],function(){
            Route::get('danhsach',[UserController::class,'index'])->name('admin.getUserList');
            Route::get('sua/{id}',[UserController::class,'edit'])->name('admin.getUserEdit');
            Route::put('sua/{id}',[UserController::class,'update'])->name('admin.postUserEdit');
            Route::delete('xoa/{id}',[UserController::class,'destroy'])->name('admin.getUserDelete');
        });
        Route::group(['prefix'=>'banner'],function(){
            Route::get('danhsach',[BannerController::class,'index'])->name('admin.getBannerList');
            Route::get('them',[BannerController::class,'getBannerAdd'])->name('admin.getBannerAdd');
            Route::post('them',[BannerController::class,'postBannerAdd'])->name('admin.postBannerAdd');
            Route::get('sua/{id}',[BannerController::class,'edit'])->name('admin.getBannerEdit');
            Route::put('sua/{id}',[BannerController::class,'update'])->name('admin.postBannerEdit');
            Route::delete('xoa/{id}',[BannerController::class,'destroy'])->name('admin.getBannerDelete');
        });
        Route::group(['prefix'=>'typeproducts'],function(){
            // admin/category/danhsach
            Route::get('danhsach',[TypeController::class,'getTypeList'])->name('admin.getTypeList');
            // admin/category/them
            Route::get('them',[TypeController::class,'getTypeAdd'])->name('admin.getTypeAdd');
            Route::post('them',[TypeController::class,'postTypeAdd'])->name('admin.postTypeAdd');
            Route::delete('xoa/{id}',[TypeController::class,'getTypeDelete'])->name('admin.getTypeDelete');
            Route::get('sua/{id}',[TypeController::class,'getTypeEdit'])->name('admin.getTypeEdit');
            Route::put('sua/{id}',[TypeController::class,'postTypeEdit'])->name('admin.postTypeEdit');
        });
        Route::group(['prefix'=>'contacts'],function(){
            Route::get('danhsach',[ContactsController::class,'listLhAll'])->name('admin.listLhAll');
            // admin/bill/{status}
            Route::get('{trangthai}',[ContactsController::class,'getLhList'])->name('admin.getLhList');
            //phần bill này không nhất thiết phải dùng request ajax, làm như những hàm bình thường, phần route này cô vẫn để lại để tham khảo
            //by laravel request
            Route::get('{id}/{trangthai}',[ContactsController::class,'updateLhStatus'])->name('admin.updateLhStatus');
            //by ajax request
            Route::post('updatelh/{id}', [ContactsController::class, 'updateLhStatusAjax'])->name('admin.updateLhStatusAjax');
           
            Route::delete('deletelh/{id}',[ContactsController::class,'cancelLh'])->name('admin.cancelLh');
        });

});