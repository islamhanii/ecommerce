<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\EndUser\AuthController as EndUserAuthController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\ProductController as EndUserProductController;
use App\Http\Controllers\EndUser\WishListController;
use App\Http\Controllers\PolicyCategoryController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductController;
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

#------------------------------------Admin Authentication---------------------------------------#
Route::get('/login-page',[AuthController::class,'index'])->name('loginPage');
Route::post('/login-page',[AuthController::class,'login'])->name('login');

#------------------------------------Admin Authentication---------------------------------------#
Route::group(['prefix' => 'user'], function(){
    Route::get('/login-page', [EndUserAuthController::class, 'index'])->name('user.loginPage');
    Route::post('/login-page', [EndUserAuthController::class, 'login'])->name('user.login');
    Route::get('/register-page', [EndUserAuthController::class, 'registerPage'])->name('user.registerPage');
    Route::post('/register-page', [EndUserAuthController::class, 'register'])->name('user.register');
});

/* 
* ------------------------------------------------------------------------------------------------
* ---------------------------------------- End User Routes -----------------------------------------
* ------------------------------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/products/{subCategoryId}/{language}', [EndUserProductController::class, 'subCategoryProducts'])->name('sub_category.products');
Route::get('/product/details/{productId}/{language}',[EndUserProductController::class, 'productDetails'])->name('product.details');

Route::group(['prefix' => 'user' , 'middleware' => ['auth']], function(){
    Route::post('/logout',[EndUserAuthController::class,'logout'])->name('user.logout');
    
    Route::group(['prefix' => 'wishlist', 'as' => 'wishlist.'], function(){
        Route::get('/{lang}', [WishListController::class, 'index'])->name('index');
        Route::post('/store', [WishListController::class, 'store'])->name('store');
        Route::delete('/delete/{id}', [WishListController::class, 'delete'])->name('delete');
    });
});

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
    
    #=================================================================================================
    #=================================================================================================
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
    #=================================================================================================
    #=================================================================================================

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

    #------------------------------------Route Company Admin---------------------------------------#
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/update', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/delete', [CompanyController::class, 'delete'])->name('companies.delete');

    #------------------------------------Route Detail Admin---------------------------------------#
    Route::get('/details', [DetailController::class, 'index'])->name('details.index');
    Route::get('/details/create', [DetailController::class, 'create'])->name('details.create');
    Route::post('/details/store', [DetailController::class, 'store'])->name('details.store');
    Route::get('/details/edit/{id}', [DetailController::class, 'edit'])->name('details.edit');
    Route::put('/details/update', [DetailController::class, 'update'])->name('details.update');
    Route::delete('/details/delete', [DetailController::class, 'delete'])->name('details.delete');

    #=================================================================================================
    #=================================================================================================
    #------------------------------------Route Policy Category Admin----------------------------------#
    Route::get('/policy-categories',[PolicyCategoryController::class,'index'])->name('policy.categories.index');
    Route::get('/policy-categories/create',[PolicyCategoryController::class,'create'])->name('policy.categories.create');
    Route::post('/policy-categories/store',[PolicyCategoryController::class,'store'])->name('policy.categories.store');
    Route::get('/policy-categories/edit/{id}',[PolicyCategoryController::class,'edit'])->name('policy.categories.edit');
    Route::put('/policy-categories/update',[PolicyCategoryController::class,'update'])->name('policy.categories.update');
    Route::delete('/policy-categories/delete',[PolicyCategoryController::class,'delete'])->name('policy.categories.delete');
    #------------------------------------Route Policy Admin---------------------------------------#
    Route::get('/policies',[PolicyController::class,'index'])->name('policies.index');
    Route::get('/policies/create',[PolicyController::class,'create'])->name('policies.create');
    Route::post('/policies/store',[PolicyController::class,'store'])->name('policies.store');
    Route::get('/policies/edit/{id}',[PolicyController::class,'edit'])->name('policies.edit');
    Route::put('/policies/update',[PolicyController::class,'update'])->name('policies.update');
    Route::delete('/policies/delete',[PolicyController::class,'delete'])->name('policies.delete');
    #=================================================================================================
    #=================================================================================================
});
