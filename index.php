<?php
session_start();

require_once "vendor\autoload.php";
require_once "config\config.php";
require_once "App\Config\database.php";
require_once "App\Config\limit.php";
use App\Routing\Route;

Route::add('/', 'HomeController@home');
Route::add('/home', 'HomeController@home');
Route::add('/thankyou', 'OrderController@thankyou');
// user
Route::add('/login', 'UserController@login');
Route::add('/login_add', 'UserController@login_add');
Route::add('/register', 'UserController@register');
Route::add('/register_add', 'UserController@register_add');
Route::add('/account', 'UserController@account');
Route::add('/logout', 'UserController@logout');
Route::add('/order_history', 'UserController@order_history');
Route::add('/order_detail_user', 'UserController@order_detail_user');
Route::add('/order_success', 'UserController@order_success');
Route::add('/add_whislist', 'UserController@add_whislist');
Route::add('/whislist', 'UserController@whislist');
Route::add('/delete_wishlist', 'UserController@delete_wishlist');
// shop
Route::add('/shop', 'ShopController@shop');
Route::add('/product/(.*)', 'ShopController@product');
// cart
Route::add('/add_cart', 'CartController@add_cart');
Route::add('/cart', 'CartController@cart');
Route::add('/update_cart', 'CartController@update_cart');
Route::add('/clear_cart', 'CartController@clear_cart');
Route::add('/checkout', 'CartController@checkout');
// product detail
Route::add('/product_detail/(.*)', 'DetailController@product_detail');
// Blog
Route::add('/blog', 'BlogController@blog');
Route::add('/blog_detail/(.*)', 'BlogController@blog_detail');

// backend
// category
Route::add('/dashboard', 'AdminController@dashboard');
Route::add('/list_category', 'CategoryController@list_category');
Route::add('/add_category', 'CategoryController@add_category');
Route::add('/handle_cate', 'CategoryController@handle_cate');
Route::add('/edit_cate', 'CategoryController@edit_cate');
Route::add('/update_cate', 'CategoryController@update_cate');
Route::add('/delete_cate', 'CategoryController@delete_cate');
Route::add('/update_status', 'CategoryController@update_status');
// brand
Route::add('/list_brand', 'BrandController@list_brand');
Route::add('/add_brand', 'BrandController@add_brand');
Route::add('/insert_brand', 'BrandController@insert_brand');
Route::add('/edit_brand', 'BrandController@edit_brand');
Route::add('/update_brand', 'BrandController@update_brand');
Route::add('/delete_brand', 'BrandController@delete_brand');
Route::add('/update_status_br', 'BrandController@update_status_br');
// product
Route::add('/list_product', 'ProductController@list_product');
Route::add('/add_product', 'ProductController@add_product');
Route::add('/insert_product', 'ProductController@insert_product');
Route::add('/edit_product', 'ProductController@edit_product');
Route::add('/update_product', 'ProductController@update_product');
Route::add('/trash', 'ProductController@trash');
Route::add('/deltrash', 'ProductController@deltrash');
Route::add('/retrash', 'ProductController@retrash');
Route::add('/search', 'ProductController@search');
// order
Route::add('/insert_order', 'OrderController@insert_order');
Route::add('/list_order', 'OrderController@list_order');
Route::add('/order_detail', 'OrderController@order_detail');
Route::add('/ShippingStatus', 'OrderController@ShippingStatus');
Route::add('/trash_order', 'OrderController@trash_order');
// banner
Route::add('/list_banner', 'BannerController@list_banner');
Route::add('/insert_banner', 'BannerController@insert_banner');
Route::add('/add_banner', 'BannerController@add_banner');
Route::add('/edit_banner', 'BannerController@edit_banner');
Route::add('/update_banner', 'BannerController@update_banner');
Route::add('/delete_banner', 'BannerController@delete_banner');
Route::add('/update_status_bn', 'BannerController@update_status_bn');
// config
Route::add('/list_config', 'ConfigController@list_config');
Route::add('/insert_config', 'ConfigController@insert_config');
Route::add('/add_config', 'ConfigController@add_config');
Route::add('/edit_config', 'ConfigController@edit_config');
Route::add('/update_config', 'ConfigController@update_config');
Route::add('/delete_config', 'ConfigController@delete_config');
Route::add('/update_status_cf', 'ConfigController@update_status_cf');
// blog
Route::add('/list_blog', 'BlogController@list_blog');
Route::add('/insert_blog', 'BlogController@insert_blog');
Route::add('/add_blog', 'BlogController@add_blog');
Route::add('/edit_blog', 'BlogController@edit_blog');
Route::add('/update_blog', 'BlogController@update_blog');
Route::add('/delete_blog', 'BlogController@delete_blog');
Route::add('/update_status_bl', 'BlogController@update_status_bl');


$uri = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/';
Route::dispatch($uri);

?>