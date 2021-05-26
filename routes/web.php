<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','FrontEnd\HomeController@index')->name('home.page');
Route::get('/product-details/{slug}','FrontEnd\HomeController@productsDetails')->name('products-details-info');

//Shopping-cart Start
Route::post('/add-to-cart', 'FrontEnd\CartController@addToCart')->name('insert.cart');
Route::get('/show-cart', 'FrontEnd\CartController@showCart')->name('show.cart');
Route::post('/update-cart', 'FrontEnd\CartController@updateCart')->name('update.cart');
Route::get('/delete-cart/{rowId}', 'FrontEnd\CartController@deleteCart')->name('delete.cart');

//customer section
Route::get('/customer-login', 'Frontend\CheckoutController@customerLogin')->name('customer.login')->middleware('guest');
Route::get('/customer-signup', 'Frontend\CheckoutController@customerSignup')->name('customer.signup');
Route::post('/signup-save', 'Frontend\CheckoutController@signupStore')->name('signup.store');
Route::get('/email-verify', 'Frontend\CheckoutController@emailVerify')->name('email.verify');
Route::post('/verify-save', 'Frontend\CheckoutController@emailStore')->name('verify.save');
Route::get('/checkout', 'Frontend\CheckoutController@shippingInfo')->name('customer.checkout');
Route::post('/checkout/save', 'Frontend\CheckoutController@shippingInfoStore')->name('checkout.store');

//customer-dashboard
Route::group(['namespace' => 'Frontend', 'middleware'=>['auth','customer']],function(){
	Route::get('/customer-dashboard','DashboardController@dashboard')->name('customer.dashboard');
	Route::get('/customer-edit-profile','DashboardController@editProfile')->name('customer.edit.profile');
	Route::post('/customer-update-profile','DashboardController@updateProfile')->name('customer.update.profile');
	Route::get('/customer-password-change','DashboardController@passwordChange')->name('customer.password.change');
	Route::post('/customer-password-update','DashboardController@passwordUpdate')->name('customer.password.update');
    
	Route::get('/payment','DashboardController@payment')->name('customer.payment');
	Route::post('/payment/save','DashboardController@paymentStore')->name('customer.payment.store');
	Route::get('/order-list','DashboardController@orderList')->name('customer.order.list');
	Route::get('/order-details/{id}','DashboardController@orderDetails')->name('customer.order.details');
});




    Route::post('/wishlist/add-wishlist/{id}', 'Frontend\WishlistController@addWishlist')->name('add.wishlist');
    Route::get('/wishlist/show-wishlist', 'Frontend\WishlistController@showWishlist')->name('show.wishlist');
    Route::get('/wishlist/delete-wishlist/{id}', 'Frontend\WishlistController@deleteWishlist')->name('delete.wishlist');

    Route::post('/product-rating/{id}', 'Frontend\ProductRatingController@store')->name('product.rating.store');




Auth::routes();


Route::group(['namespace' => 'BackEnd', 'middleware' => ['auth','admin'] ], function(){

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::prefix('profiles')->group(function(){
        Route::get('/view', 'ProfileController@view')->name('profiles.view');
        Route::get('/edit/', 'ProfileController@edit')->name('profiles.edit');
        Route::post('/update/', 'ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    Route::prefix('categories')->group(function(){
        Route::get('/add', 'CategoryController@add')->name('categories.add');
        Route::post('/save', 'CategoryController@store')->name('categories.save');
        Route::get('/view', 'CategoryController@view')->name('categories.view');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('products')->group(function(){
        Route::get('/add', 'ProductController@add')->name('products-add');
        Route::post('/save', 'ProductController@store')->name('products-save');
        Route::get('/view', 'ProductController@view')->name('products-view');
        Route::get('/edit/{id}', 'ProductController@edit')->name('products-edit');
        Route::post('/update/{id}', 'ProductController@update')->name('products-update');
        Route::get('/delete/{id}', 'ProductController@delete')->name('products-delete');
        Route::get('/details/{id}', 'ProductController@details')->name('products-details');
    });

    Route::prefix('orders')->group(function(){
        Route::get('/pending/list', 'OrderController@pendingList')->name('orders.pending.list');
        Route::get('/approved/list', 'OrderController@approvedList')->name('orders.approved.list');
        Route::get('/details/{id}', 'OrderController@details')->name('orders.details');
        Route::get('/active/{id}', 'OrderController@activeOrder')->name('active.order');

    });


});
