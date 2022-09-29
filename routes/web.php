<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisementController;
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
use App\Http\Controllers\SliderController;
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

/* 
* ------------------------------------------------------------------------------------------------
* ---------------------------------------- Public Routes -----------------------------------------
* ------------------------------------------------------------------------------------------------
*/

Route::get('/login-page',[AuthController::class,'index'])->name('loginPage');
Route::post('/login-page',[AuthController::class,'login'])->name('login');

/* 
* ------------------------------------------------------------------------------------------------
* ---------------------------------------- End User Routes -----------------------------------------
* ------------------------------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class,'index'])->name('home');

/* 
* ------------------------------------------------------------------------------------------------
* ---------------------------------------- Admin Routes -----------------------------------------
* ------------------------------------------------------------------------------------------------
*/

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
    Route::get('/products-details/index',[ProductDetailsController::class,'index'])->name('product.details.index');
    Route::get('/products-details/create',[ProductDetailsController::class,'create'])->name('product.details.create');
    Route::post('/products-details/store',[ProductDetailsController::class,'store'])->name('product.details.store');
    Route::get('/products-details/edit/{id}',[ProductDetailsController::class,'edit'])->name('product.details.edit');
    Route::put('/products-details/update',[ProductDetailsController::class,'update'])->name('product.details.update');
    Route::delete('/products-details/delete',[ProductDetailsController::class,'delete'])->name('product.details.delete');

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
    #------------------------------------Route Sizes Admin---------------------------------------#
    Route::get('/sizes',[SizeController::class,'index'])->name('sizes.index');
    Route::get('/sizes/create',[SizeController::class,'create'])->name('sizes.create');
    Route::post('/sizes/store',[SizeController::class,'store'])->name('sizes.store');
    Route::get('/sizes/edit/{id}',[SizeController::class,'edit'])->name('sizes.edit');
    Route::put('/sizes/update',[SizeController::class,'update'])->name('sizes.update');
    Route::delete('/sizes/delete',[SizeController::class,'delete'])->name('sizes.delete');

    #------------------------------------Route Slider Admin---------------------------------------#
    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('/sliders/store', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('/sliders/update', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/delete', [SliderController::class, 'delete'])->name('sliders.delete');

    #------------------------------------Route About Admin---------------------------------------#
    Route::get('/abouts', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('/abouts/create', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('/abouts/store', [AboutController::class, 'store'])->name('abouts.store');
    Route::get('/abouts/edit/{id}', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::put('/abouts/update', [AboutController::class, 'update'])->name('abouts.update');
    Route::delete('/abouts/delete', [AboutController::class, 'delete'])->name('abouts.delete');

    #------------------------------------Route Advertisement Admin---------------------------------------#
    Route::get('/advertisements', [AdvertisementController::class, 'index'])->name('advertisements.index');
    Route::get('/advertisements/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::post('/advertisements/store', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/advertisements/edit/{id}', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::put('/advertisements/update', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::delete('/advertisements/delete', [AdvertisementController::class, 'delete'])->name('advertisements.delete');

    #------------------------------------Route CategoryPolicy Admin---------------------------------------#
    Route::get('/category-policy',[CategoryPolicyController::class,'index'])->name('categoryPolicy.index');
    Route::get('/category-policy/create',[CategoryPolicyController::class,'create'])->name('categoryPolicy.create');
    Route::post('/category-policy/store',[CategoryPolicyController::class,'store'])->name('categoryPolicy.store');
    Route::get('/category-policy/edit/{id}',[CategoryPolicyController::class,'edit'])->name('categoryPolicy.edit');
    Route::put('/category-policy/update',[CategoryPolicyController::class,'update'])->name('categoryPolicy.update');
    Route::delete('/category-policy/delete',[CategoryPolicyController::class,'delete'])->name('categoryPolicy.delete');
    
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
