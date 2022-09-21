<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Category_PolicyController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\WishListController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EndUser\ProductsController as EndUserProductsController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SizeUnitsController;
use App\Http\Controllers\SubCategoryController;
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

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');
Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['prefix' => 'admin','middleware' => ['auth']], function (){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    #------------------------------------Route Categories Admin---------------------------------------#
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/update',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories/delete',[CategoryController::class,'delete'])->name('categories.delete');
    #------------------------------------Route SubCategories Admin---------------------------------------#
    Route::get('/subcategories',[SubCategoryController::class,'index'])->name('sub_categories.index');
    Route::get('/subcategories/create',[SubCategoryController::class,'create'])->name('sub_categories.create');
    Route::post('/subcategories/store',[SubCategoryController::class,'store'])->name('sub_categories.store');
    Route::get('/subcategories/edit/{id}',[SubCategoryController::class,'edit'])->name('sub_categories.edit');
    Route::put('/subcategories/update',[SubCategoryController::class,'update'])->name('sub_categories.update');
    Route::delete('/subcategories/delete',[SubCategoryController::class,'delete'])->name('sub_categories.delete');
    #------------------------------------Route Products Admin---------------------------------------#
    Route::get('/products',[ProductController::class,'index'])->name('products.index');
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
    Route::put('/products/update',[ProductController::class,'update'])->name('products.update');
    Route::delete('/products/delete',[ProductController::class,'delete'])->name('products.delete');
    Route::get('/products/upload',[ProductController::class,'uploadPage'])->name('products.uploadPage');
    Route::post('/products/upload',[ProductController::class,'upload'])->name('products.upload');
    Route::get('/products/update',[ProductController::class,'updateUploadPage'])->name('products.updatePage');
    Route::post('/products/update',[ProductController::class,'uploadUpdate'])->name('products.updateUploadProducts');
    Route::post('/products/images/scan',[ProductController::class,'scanImages'])->name('products.scanImages');
    #------------------------------------Route Product Details Admin---------------------------------------#
    Route::get('/products/details/index',[ProductDetailsController::class,'index'])->name('product.details.index');
    Route::get('/products/details/create',[ProductDetailsController::class,'create'])->name('product.details.create');
    Route::post('/products/details/store',[ProductDetailsController::class,'store'])->name('product.details.store');
    Route::get('/products/details/upload',[ProductDetailsController::class,'upload'])->name('product.details.uploadPage');
    Route::post('/products/details/upload',[ProductDetailsController::class,'uploadFile'])->name('product.details.upload');

    #------------------------------------Route Colors Admin---------------------------------------#
    Route::get('colors', [ColorController::class, 'index'])->name('colors.index');
    Route::get('colors/create', [ColorController::class, 'create'])->name('colors.create');
    Route::post('colors/store', [ColorController::class, 'store'])->name('colors.store');
    Route::get('colors/edit/{id}', [ColorController::class, 'edit'])->name('colors.edit');
    Route::put('colors/update', [ColorController::class, 'update'])->name('colors.update');
    Route::delete('colors/delete', [ColorController::class, 'delete'])->name('colors.delete');
    #------------------------------------Route SizeUnits Admin---------------------------------------#
    Route::get('/size-unit',[SizeUnitsController::class,'index'])->name('size-unit.index');
    Route::get('/size-unit/create',[SizeUnitsController::class,'create'])->name('size-unit.create');
    Route::post('/size-unit/store',[SizeUnitsController::class,'store'])->name('size-unit.store');
    Route::get('/size-unit/edit/{id}',[SizeUnitsController::class,'edit'])->name('size-unit.edit');
    Route::put('/size-unit/update',[SizeUnitsController::class,'update'])->name('size-unit.update');
    Route::delete('/size-unit/delete',[SizeUnitsController::class,'delete'])->name('size-unit.delete');
#------------------------------------Route SizeUnits Admin---------------------------------------#
    Route::get('/sizes',[SizeController::class,'index'])->name('sizes.index');
    Route::get('/sizes/create',[SizeController::class,'create'])->name('sizes.create');
    Route::post('/sizes/store',[SizeController::class,'store'])->name('sizes.store');
    Route::get('/sizes/edit/{id}',[SizeController::class,'edit'])->name('sizes.edit');
    Route::put('/sizes/update',[SizeController::class,'update'])->name('sizes.update');
    Route::delete('/sizes/delete',[SizeController::class,'delete'])->name('sizes.delete');
#------------------------------------Route CategoryPolicy Admin---------------------------------------#
    Route::get('/category_policy',[Category_PolicyController::class,'index'])->name('categoryPolicy.index');
    Route::get('/category_policy/create',[Category_PolicyController::class,'create'])->name('categoryPolicy.create');
    Route::post('/category_policy/store',[Category_PolicyController::class,'store'])->name('categoryPolicy.store');
    Route::get('/category_policy/edit/{id}',[Category_PolicyController::class,'edit'])->name('categoryPolicy.edit');
    Route::put('/category_policy/update',[Category_PolicyController::class,'update'])->name('categoryPolicy.update');
    Route::delete('/category_policy/delete',[Category_PolicyController::class,'delete'])->name('categoryPolicy.delete');
#------------------------------------Route Policy Admin---------------------------------------#
    Route::get('/policies',[PolicyController::class,'index'])->name('policy.index');
    Route::get('/policies/create',[PolicyController::class,'create'])->name('policy.create');
    Route::post('/policies/store',[PolicyController::class,'store'])->name('policy.store');
    Route::get('/policies/edit/{id}',[PolicyController::class,'edit'])->name('policy.edit');
    Route::put('/policies/update',[PolicyController::class,'update'])->name('policy.update');
    Route::delete('/policies/delete',[PolicyController::class,'delete'])->name('policy.delete');
});


Route::group(['prefix' => 'user' , 'middleware' => ['auth'], 'as' => 'wishlist.'], function(){

    Route::get('/wishlist/{lang}', [WishListController::class, 'index']);
    Route::post('/wishlist', [WishListController::class, 'store'])->name('store');
    Route::delete('/wishlist/delete/{id}', [WishListController::class, 'destroy'])->name('delete');
});

Route::get('/products/{sub_category_id}/{lang}',[EndUserProductsController::class, 'subCategoryProducts'])->name('products');
Route::get('/product/details/{productId}/{lang}',[EndUserProductsController::class, 'productDetail'])->name('product.details');

Route::get('/login-page',[AuthController::class,'index'])->name('loginPage');
Route::post('/login-page',[AuthController::class,'login'])->name('login');
