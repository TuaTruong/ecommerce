<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

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

// Backend
Route::get("/admin", [AdminController::class,"index"]);
Route::post("/admin-dashboard", [AdminController::class,"dashboard"]);

Route::middleware(["admin"])->group(function(){
    // Admin
    Route::get("/dashboard", [AdminController::class,"show_dashboard"])->middleware("admin");
    Route::get("/logout", [AdminController::class,"logout"])->middleware("admin");

    // Category
    Route::get("/all-category", [CategoryController::class,"all_category"]);
    Route::get("/add-category", [CategoryController::class,"add_category"]);
    Route::post("/save-category", [CategoryController::class,"save_category"]);
    Route::patch("/update-category/{category_id}", [CategoryController::class,"update_category"]);
    Route::get("/edit-category/{category_id}", [CategoryController::class,"edit_category"]);
    Route::get("/delete-category/{category_id}", [CategoryController::class,"delete_category"]);
    Route::get("/toggle-category-status/{category_id}", [CategoryController::class,"toggle_category_status"]);
    Route::post("/import-csv", [CategoryController::class,"import_csv"]);
    Route::post("/export-csv", [CategoryController::class,"export_csv"]);

    // Brand
    Route::get("/add-brand", [BrandController::class,"add_brand"]);
    Route::post("/save-brand", [BrandController::class,"save_brand"]);
    Route::get("/edit-brand/{brand_id}", [BrandController::class,"edit_brand"]);
    Route::patch("/update-brand/{brand_id}", [BrandController::class,"update_brand"]);
    Route::get("/delete-brand/{brand_id}", [BrandController::class,"delete_brand"]);
    Route::get("/toggle-brand-status/{brand_id}", [BrandController::class,"toggle_brand_status"]);
    Route::get("/all-brand", [BrandController::class,"all_brands"]);

    //Product
    Route::get("/add-product", [ProductController::class,"add_product"]);
    Route::post("/save-product", [ProductController::class,"save_product"]);
    Route::patch("/update-product/{product_id}", [ProductController::class,"update_product"]);
    Route::get("/edit-product/{product_id}", [ProductController::class,"edit_product"]);
    Route::get("/delete-product/{product_id}", [ProductController::class,"delete_product"]);
    Route::get("/toggle-product-status/{product_id}", [ProductController::class,"toggle_product_status"]);
    Route::get("/all-product", [ProductController::class,"all_product"]);

    //Order
    Route::get("/manage-order", [OrderController::class,"manage_order"]);
    Route::get("/view-order/{order_code}", [OrderController::class,"view_order"]);
    Route::get("/print-order/{checkout_code}", [OrderController::class,"print_order"]);
    Route::post("/update-order-status", [OrderController::class,"update_order_status"]);
    Route::post("/update-order-quantity", [OrderController::class,"update_order_quantity"]);

    //Coupon
    Route::get("/add-coupon",[CouponController::class,"add_coupon"]);
    Route::get("/all-coupons",[CouponController::class,"all_coupons"]);
    Route::post("/save-coupon",[CouponController::class,"save_coupon"]);
    Route::get("/delete-coupon/{coupon_id}",[CouponController::class,"delete_coupon"]);

    //Delivery
    Route::get("/delivery",[DeliveryController::class,"delivery"]);
    Route::post("/add-delivery",[DeliveryController::class,"add_delivery"]);
    Route::post("/select-feeship",[DeliveryController::class,"select_feeship"]);
    Route::post("/update-delivery",[DeliveryController::class,"update_delivery"]);


    //Banner slide
    Route::get("/all-slides",[SliderController::class,"all_sliders"]);
    Route::get("/add-slide",[SliderController::class,"add_slider"]);
    Route::post("/save-slide",[SliderController::class,"save_slide"]);
});

// Home
Route::get('/', [HomeController::class,"index"]);
Route::get('/trang-chu', [HomeController::class,"index"]);

# Danh muc san pham
Route::get('/danh-muc-san-pham/{category:id}', [CategoryController::class,"show_category_home"]);

# Thuong hieu san pham
Route::get('/thuong-hieu-san-pham/{brand:id}', [BrandController::class,"show_brand_home"]);

# Chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class,"detail_product"]);

//Cart
Route::post("/save-cart", [CartController::class,"save_cart"]);
// Route::get("/show-cart", [CartController::class,"show_cart"]);
Route::get("/gio-hang", [CartController::class,"gio_hang"]);
Route::get("/delete-to-cart/{rowId}", [CartController::class,"delete_to_cart"]);
Route::post("/update-cart-quantity", [CartController::class,"update_cart_quantity"]);
Route::post("/update-cart", [CartController::class,"update_cart"]);
Route::get("/delete-all-cart-product", [CartController::class,"delete_all_cart_product"]);
Route::get("/delete-cart-product/{session_id}", [CartController::class,"delete_cart_product"]);
Route::post("/add-cart-ajax",[CartController::class,"add_cart_ajax"]);

//Coupon
Route::post("/check-coupon",[CouponController::class,"check_coupon"]);
Route::get("/unset-coupon",[CouponController::class,"delete_current_coupon"]);

//Auth
Route::post("/register-user", [AuthController::class,"register_user"]);
Route::get("/logout-user",[AuthController::class,"logout_user"])->middleware("auth");
Route::get("/login-checkout", [AuthController::class,"login_checkout"]);
Route::post("/login-user",[AuthController::class,"login_user"]);

//Checkout
Route::middleware(['auth'])->group(function () {
    Route::get("/checkout", [CheckoutController::class,"checkout"]);
    Route::post("/save-checkout", [CheckoutController::class,"save_checkout"]);
    Route::get("/payment", [CheckoutController::class,"payment"]);
    Route::post("/order-place",[CheckoutController::class,"order_place"]);
    Route::post("/select-delivery",[DeliveryController::class,"select_delivery"]);


    Route::post("/calculate-fee",[DeliveryController::class,"calculate_fee"]);
    Route::get("/delete-fee",[DeliveryController::class,"delete_fee"]);
    Route::post("/confirm-order",[CheckoutController::class,"confirm_order"]);
});

Route::get("/session",[HomeController::class,"session"]);
