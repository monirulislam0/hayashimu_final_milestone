<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/',            [AdminController::class, 'AdminLoginForm'])->name('login.form');
    Route::post('login',   [AdminController::class, 'AdminLogin'])->name('login');
});
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/logout',            [AdminController::class, 'AdminLogout'])->name('logout');
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('contact-message',[DashboardController::class,'contactMessage'])->name('contact-message');
    Route::get('/settings',[SettingController::class,'index'])->name('setting');
    Route::group(['prefix'=> 'categories'],function (){
        Route::get('/','App\Http\Controllers\CategoryController@index')->name('categories.index');
        Route::get('/create','App\Http\Controllers\CategoryController@create')->name('categories.create');
        Route::post('/store','App\Http\Controllers\CategoryController@store')->name('categories.store');
        Route::get('/{id}/edit','App\Http\Controllers\CategoryController@edit')->name('categories.edit');
        Route::post('update','App\Http\Controllers\CategoryController@update')->name('categories.update');
        Route::get('/{id}/delete','App\Http\Controllers\CategoryController@delete')->name('categories.delete');

    });

    Route::group(['prefix'=> 'sliders'],function (){
        Route::get('/','App\Http\Controllers\Admin\SliderController@index')->name('sliders.index');
        Route::get('/create','App\Http\Controllers\Admin\SliderController@create')->name('sliders.create');
        Route::post('/store','App\Http\Controllers\Admin\SliderController@store')->name('sliders.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\SliderController@edit')->name('sliders.edit');
        Route::post('update','App\Http\Controllers\Admin\SliderController@update')->name('sliders.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\SliderController@delete')->name('sliders.delete');
    });


    Route::group(['prefix'=> 'products'],function (){
        Route::get('/','App\Http\Controllers\Admin\ProductController@index')->name('products.index');
        Route::get('/create','App\Http\Controllers\Admin\ProductController@create')->name('products.create');
        Route::post('/store','App\Http\Controllers\Admin\ProductController@store')->name('products.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\ProductController@edit')->name('products.edit');
        Route::post('update','App\Http\Controllers\Admin\ProductController@update')->name('products.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\ProductController@delete')->name('products.delete');
        Route::post('/product/image/store','App\Http\Controllers\Admin\ProductImageController@upload')->name('products.images.upload');
        Route::get('/product/image/delete/{id}','App\Http\Controllers\Admin\ProductImageController@delete')->name('products.images.delete');
        Route::post('/description','App\Http\Controllers\Admin\ProductController@description')->name('products.description');
        Route::post('/meta','App\Http\Controllers\Admin\ProductController@meta')->name('products.meta');
        Route::get('/export','App\Http\Controllers\Admin\ProductController@exportProductData')->name('products.export');
        Route::get('/import/view','App\Http\Controllers\Admin\ProductController@importView')->name('products.import.view');
        Route::post('/import','App\Http\Controllers\Admin\ProductController@import')->name('products.import');

    });

    Route::group(['prefix'=> 'area'],function (){
        Route::get('/','App\Http\Controllers\Admin\AreaController@index')->name('areas.index');
        Route::get('/create','App\Http\Controllers\Admin\AreaController@create')->name('areas.create');
        Route::post('/store','App\Http\Controllers\Admin\AreaController@store')->name('areas.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\AreaController@edit')->name('areas.edit');
        Route::post('update','App\Http\Controllers\Admin\AreaController@update')->name('areas.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\AreaController@delete')->name('areas.delete');

    });
    Route::group(['prefix'=> 'services'],function (){
        Route::get('/','App\Http\Controllers\Admin\ServiceController@index')->name('services.index');
        Route::get('/create','App\Http\Controllers\Admin\ServiceController@create')->name('services.create');
        Route::post('/store','App\Http\Controllers\Admin\ServiceController@store')->name('services.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\ServiceController@edit')->name('services.edit');
        Route::post('update','App\Http\Controllers\Admin\ServiceController@update')->name('services.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\ServiceController@delete')->name('services.delete');

    });
    Route::group(['prefix'=> 'news'],function (){
        Route::get('/','App\Http\Controllers\Admin\NewsController@index')->name('news.index');
        Route::get('/create','App\Http\Controllers\Admin\NewsController@create')->name('news.create');
        Route::post('/store','App\Http\Controllers\Admin\NewsController@store')->name('news.store');
        Route::get('/{id}/edit','App\Http\Controllers\Admin\NewsController@edit')->name('news.edit');
        Route::post('update','App\Http\Controllers\Admin\NewsController@update')->name('news.update');
        Route::get('/{id}/delete','App\Http\Controllers\Admin\NewsController@delete')->name('news.delete');
    });
    Route::group(['prefix'=> 'home-page'],function (){
        Route::get('/why-i-choose','App\Http\Controllers\Admin\HomePageContentController@whyIChoose')->name('static.why-i-choose');
        Route::post('/why-i-choose/update','App\Http\Controllers\Admin\HomePageContentController@updateWhyIChoose')->name('static.why-i-choose.update');
        Route::get('/view-more','App\Http\Controllers\Admin\HomePageContentController@viewMore')->name('static.view-more');
        Route::post('/view-more/update','App\Http\Controllers\Admin\HomePageContentController@updateviewMore')->name('static.view-more.update');
    });
    Route::group(['prefix'=> 'about-page'],function (){
        Route::get('/','App\Http\Controllers\Admin\HomePageContentController@aboutPage')->name('static.about');
        Route::post('/update','App\Http\Controllers\Admin\HomePageContentController@updateAboutPage')->name('static.about.update');
    });
    Route::group(['prefix'=> 'sidebar-image'],function (){
        Route::get('/','App\Http\Controllers\Admin\HomePageContentController@sidebarImage')->name('static.sidebar-image');
        Route::post('/update','App\Http\Controllers\Admin\HomePageContentController@updateSidebarImage')->name('static.sidebar-image.update');
    });

    Route::group(['prefix'=> 'footer'],function (){
        Route::get('/','App\Http\Controllers\Admin\HomePageContentController@footer')->name('static.footer');
        Route::post('/update','App\Http\Controllers\Admin\HomePageContentController@updateFooter')->name('static.footer.update');
    });

    Route::group(['prefix'=> 'top-sidebar'],function (){
        Route::get('/','App\Http\Controllers\Admin\HomePageContentController@topSidebar')->name('static.top-sidebar');
        Route::post('/update','App\Http\Controllers\Admin\HomePageContentController@updateTopSidebar')->name('static.top-sidebar.update');
    });
    Route::group(['prefix'=> 'news-banner'],function (){
        Route::get('/','App\Http\Controllers\Admin\HomePageContentController@newsBanner')->name('static.news-banner');
        Route::post('/update','App\Http\Controllers\Admin\HomePageContentController@updateNewsBanner')->name('static.news-banner.update');
    });
    Route::group(['prefix'=> 'certification-banner'],function (){
        Route::get('/','App\Http\Controllers\Admin\HomePageContentController@certificationBanner')->name('static.certification-banner');
        Route::post('/update','App\Http\Controllers\Admin\HomePageContentController@updateCertificationBanner')->name('static.certification-banner.update');
    });

    Route::group(['prefix'=> 'orders'],function (){
        Route::get('/','App\Http\Controllers\Admin\OrderManagementController@index')->name('orders.index');
        Route::get('/view/{id}','App\Http\Controllers\Admin\OrderManagementController@viewOrder')->name('orders.view');
    });
});
