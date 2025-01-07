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


use App\Http\Controllers\Auth\SystemAdminLoginController;
use App\Http\Controllers\SystemAdminController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//======================================================================================================
//                   Others ROUTES
//======================================================================================================
Route::post('uploadFile', [MediaController::class,'saveFileJson']);
Route::post('uploadFile', [MediaController::class,'saveVideoJson']);
Route::post('uploadFile', [MediaController::class,'saveMultiFileJson']);
Route::post('uploadFile', [MediaController::class,'saveMultiFileJsonNew']);


Route::get('/lang/', [WebsiteController::class,'setLanguage'])->name('setLanguage');


Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ]
    , function () {



        Route::get('', 'WebsiteController@gotoIndex')->name('website.home2');

        Route::get('home', 'WebsiteController@index')->name('website.home');
















//===============================================================
//                 SYSTEM ADMIN ROUTES
//===============================================================
        Route::prefix('admin/system')->group(function () {
            Route::get('/login', [SystemAdminLoginController::class,'showLoginForm'])->middleware(['guest:system_admin'])->name('system_admin.showLogin');
            Route::post('/login', [SystemAdminLoginController::class,'login'])->middleware(['guest:system_admin'])->name('system_admin.login');
            Route::get('/logout', [SystemAdminLoginController::class,'logout'])->middleware(['auth:system_admin', 'active','delete_temp'])->name('system_admin.logout');
        });

        Route::prefix('admin/system')->middleware(['auth:system_admin'])->group(function () {
            Route::get('/generalProperties', [SystemAdminController::class,'generalProperties'])->name('system_admin.generalProperties');
            Route::view('/activation', 'system_admin.system_activation')->name('system_admin.activation');
            Route::post('/activate', [SystemAdminController::class,'activate'])->name('system_admin.activate');
        });


        Route::prefix('admin/system')->middleware(['auth:system_admin','delete_temp'])->group(function () {
            Route::get('/', [SystemAdminController::class,'home'])->name('system_admin.dashboard');


            Route::prefix('settings')->middleware(['checkRule:view,settings'])->group(function () {
                Route::get('', [SettingController::class,'index'])->name('system.settings.index');
                Route::post('add', [SettingController::class,'add'])->name('system.settings.add');
                Route::get('sys', [SettingController::class,'system_settings'])->name('system.settings.system_settings');
                Route::post('export', [SettingController::class,'exportDB'])->name('system.settings.exportDB');
                Route::post('trancateDB', [SettingController::class,'trancateDB'])->name('system.settings.trancateDB');

            });

            Route::get('getNotifications', 'SettingController@getNotifications')->name('system_admin.get.notifications');
            Route::get('quick-search', 'SystemAdminController@quick-search')->name('system_admin.quick-search');

            Route::get('sh/{id}', 'WebsiteController@shortLink')->name('short_link');


//=====================================================================================================
//                   ADMIN ROUTRS
//=====================================================================================================

            Route::prefix('admins/')->middleware(['checkRule:view,admin'])->group(function () {
                Route::get('', [AdminsController::class,'index'])->name('system.admin.index');
                Route::get('show_create', [AdminsController::class,'showCreateView'])->name('system.admin.create');
                Route::post('create', [AdminsController::class,'create'])->name('system.admin.do.create');
                Route::get('show_change_permission/{id}', [AdminsController::class,'showPermissionView'])->name('system.admin.permission');
                Route::post('change_permission', [AdminsController::class,'changePermission'])->name('system.admin.do.permission');
                Route::get('{id}/update', [AdminsController::class,'showUpdateView'])->name('system.admin.update');
                Route::get('{id}/update', 'AdminsController@showUpdateView')->name('system.admin.update');
                Route::post('update/{id}', 'AdminsController@Update')->name('system.admin.do.update');
                Route::get('{id}/password', 'AdminsController@showPasswordView')->name('system.admin.password');
                Route::post('password/{id}', 'AdminsController@password')->name('system.admin.do.password');
                Route::post('delete', 'AdminsController@delete')->name('system.admin.delete');
            });
            Route::prefix('profile')->group(function () {
                Route::get('', 'AdminsController@showProfileView')->name('system.admin.profile');
                Route::get('showpassword', 'AdminsController@showProfilePasswordView')->name('system.admin.profile.password');
                Route::post('updatepassword', 'AdminsController@profilePassword')->name('system.admin.do.profile.password');

                Route::post('do_update', 'AdminsController@profile')->name('system.admin.do.profile');

            });

    //======================================================================================================

    Route::prefix('categories/')->middleware(['checkRule:view,categories'])->group(function () {
        Route::get('', [CategoryController::class,'index'])->name('system.categories.index');
        Route::get('create', [CategoryController::class,'create'])->name('system.categories.create')->middleware(['checkRule:add,categories']);
        Route::post('store', [CategoryController::class,'store'])->name('system.categories.store')->middleware(['checkRule:add,categories']);//
        Route::get('/{id}/edit', [CategoryController::class,'edit'])->name('system.categories.edit')->middleware(['checkRule:edit,categories']);
        Route::post('update/{id}', [CategoryController::class,'update'])->name('system.categories.update')->middleware(['checkRule:edit,categories']);
        Route::post('delete', [CategoryController::class,'delete'])->name('system.categories.delete')->middleware(['checkRule:delete,categories']);
        Route::post('createJson', [CategoryController::class,'createJson'])->name('system.categories.createJson')->middleware(['checkRule:add,categories']);//
        Route::post('activate', [CategoryController::class,'activate'])->name('system.categories.activate')->middleware(['checkRule:activate,categories']);
        Route::post('deactivate', [CategoryController::class,'deactivate'])->name('system.categories.deactivate')->middleware(['checkRule:activate,categories']);
    });



        });

    });









