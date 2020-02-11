<?php

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

// Route::get('/', function () {
//     return view('index');
// });
Route::post('/login', 'Auth\LoginController@customerLogin')->name('login');
Route::get('/logout', 'Auth\LoginController@customerLogout')->name('logout');
Route::get('/', 'Frontend\HomeController@index')->name('index');
Route::get('/about-us', 'Frontend\HomeController@about')->name('about');
Route::get('/collection', 'Frontend\CollectionController@index')->name('collection');
Route::get('/collection-detail/{id}', 'Frontend\CollectionController@collectionDetail')->name('collection-detail');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');
Route::get('/cart', 'Frontend\CartController@cart')->name('cart');
Route::get('/addTocart', 'Frontend\CollectionController@getAddToCart')->name('addTocart');
Route::post('/placeOrder', 'Frontend\OrderController@placeOrder')->name('place_order');

Route::group(['middleware' => ['auth:customer']], function () {
	Route::get('/order', 'Frontend\OrderController@index')->name('order');
	Route::get('/savedAddress', 'Frontend\ShippingController@index')->name('address');
	Route::get('/removecart', 'Frontend\CollectionController@removeCart')->name('removecart');
	Route::get('/profile', 'Frontend\ProfileController@index')->name('profile');
	Route::post('/updateProfile', 'Frontend\ProfileController@updateProfile')->name('update_profile');	
    Route::post('/couponApply', 'Frontend\OrderController@couponApply')->name('coupon_apply');
    Route::get('/removeShipping', 'Frontend\ShippingController@removeShipping')->name('remove_shipping');
    Route::post('/saveAddress', 'Frontend\ShippingController@saveAddress')->name('add_shipping');
});


Route::get('/redirect', 'Auth\LoginController@redirect')->name('redirect');
Route::get('/callback', 'Auth\LoginController@callback');
// Route::get('/fb-redirect', 'Frontend\LoginController@redirectToFacebook');
// Route::get('/fb-callback', 'Frontend\LoginController@handleFacebookCallback');



Route::post('/register', 'Auth\RegisterController@createCustomer')->name('registeration');
Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {
 Route::get('/addProduct', 'Admin\ProductController@addProduct')->name('add_product');
 Route::get('/productDetail/{id}', 'Admin\ProductController@viewProduct')->name('view_product');
 Route::post('/saveProduct', 'Admin\ProductController@saveProduct')->name('save_product');
 Route::post('/updateProduct', 'Admin\ProductController@updateProduct')->name('update_product');
 Route::get('/editProduct/{id}', 'Admin\ProductController@editProduct')->name('edit_product');
 Route::get('/productList', 'Admin\ProductController@index')->name('product_list');
 Route::get('/orderList', 'Admin\OrderController@index')->name('order_list');
 Route::get('/orderDetail/{id}/{customer_id}', 'Admin\OrderController@viewOrder')->name('order_detail');
 Route::get('/customerDetail/{id}', 'Admin\CustomerController@viewCustomer')->name('customer_detail');
 Route::get('/customerList', 'Admin\CustomerController@index')->name('customer_list');
 Route::get('/bannerList', 'Admin\BannerController@index')->name('banner_list');
 Route::get('/addBanner', 'Admin\BannerController@addBanner')->name('add_banner');
 Route::post('/saveBanner', 'Admin\BannerController@saveBanner')->name('save_banner');
 Route::get('/couponList', 'Admin\CouponController@index')->name('coupon_list');
 Route::post('/saveCoupon', 'Admin\CouponController@saveCoupon')->name('save_coupon');
 Route::get('/changeStatus/{id}/{status}/{table}', 'Controller@changeStatus')->name('change_status');
 Route::get('/addCoupon', 'Admin\CouponController@addCoupon')->name('add_coupon');
 Route::get('/', 'Admin\HomeController@index')->name('dashboard');
});

Route::prefix('admin')->group(function () {
Route::get('/login', 'Auth\LoginController@adminloginForm')->name('admin.login');
Route::post('/adminlogin', 'Auth\LoginController@adminlogin')->name('admin_login');
Route::get('/adminlogout', 'Auth\LoginController@adminlogout')->name('admin_logout');
});
