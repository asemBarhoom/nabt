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
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\ToureventController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\StepController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//======================================================================================================
//                   Others ROUTES
//======================================================================================================
Route::post('uploadFile', [MediaController::class, 'saveFileJson']);
Route::post('uploadVideo', [MediaController::class, 'saveVideoJson']);
Route::post('uploadFiles', [MediaController::class, 'saveMultiFileJson']);
Route::post('uploadFilesNew', [MediaController::class, 'saveMultiFileJsonNew']);


Route::get('/lang/', [WebsiteController::class,'setLanguage'])->name('setLanguage');


Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ]
    , function () {

















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

            Route::get('getNotifications', [SettingController::class,'getNotifications'])->name('system_admin.get.notifications');
            Route::get('quick-search', [SystemAdminController::class,'quick-search'])->name('system_admin.quick-search');

            Route::get('sh/{id}', [WebsiteController::class,'shortLink'])->name('short_link');


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
                Route::post('update/{id}', [AdminsController::class,'Update'])->name('system.admin.do.update');
                 Route::get('{id}/password', [AdminsController::class,'showPasswordView'])->name('system.admin.password');
                Route::post('password/{id}', [AdminsController::class,'password'])->name('system.admin.do.password');
                Route::post('delete', [AdminsController::class,'delete'])->name('system.admin.delete');
            });
            Route::prefix('profile')->group(function () {
                Route::get('', [AdminsController::class,'showProfileView'])->name('system.admin.profile');
                Route::get('showpassword', [AdminsController::class,'showProfilePasswordView'])->name('system.admin.profile.password');
                Route::post('updatepassword', [AdminsController::class,'profilePassword'])->name('system.admin.do.profile.password');

                Route::post('do_update', [AdminsController::class,'profile'])->name('system.admin.do.profile');

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

            //======================================================================================================

            Route::prefix('destinations/')->middleware(['checkRule:view,destinations'])->group(function () {
                Route::get('', [DestinationController::class,'index'])->name('system.destinations.index');
                Route::get('create', [DestinationController::class,'create'])->name('system.destinations.create')->middleware(['checkRule:add,destinations']);
                Route::post('store', [DestinationController::class,'store'])->name('system.destinations.store')->middleware(['checkRule:add,destinations']);//
                Route::get('/{id}/edit', [DestinationController::class,'edit'])->name('system.destinations.edit')->middleware(['checkRule:edit,destinations']);
                Route::post('update/{id}', [DestinationController::class,'update'])->name('system.destinations.update')->middleware(['checkRule:edit,destinations']);
                Route::post('delete', [DestinationController::class,'delete'])->name('system.destinations.delete')->middleware(['checkRule:delete,destinations']);
                Route::post('createJson', [DestinationController::class,'createJson'])->name('system.destinations.createJson')->middleware(['checkRule:add,destinations']);//
                Route::post('activate', [DestinationController::class,'activate'])->name('system.destinations.activate')->middleware(['checkRule:activate,destinations']);
                Route::post('deactivate', [DestinationController::class,'deactivate'])->name('system.destinations.deactivate')->middleware(['checkRule:activate,destinations']);
            });

            //======================================================================================================

            Route::prefix('favorites/')->middleware(['checkRule:view,favorites'])->group(function () {
                Route::get('', [FavoriteController::class,'index'])->name('system.favorites.index');
                Route::get('create', [FavoriteController::class,'create'])->name('system.favorites.create')->middleware(['checkRule:add,favorites']);
                Route::post('store', [FavoriteController::class,'store'])->name('system.favorites.store')->middleware(['checkRule:add,favorites']);//
                Route::get('/{id}/edit', [FavoriteController::class,'edit'])->name('system.favorites.edit')->middleware(['checkRule:edit,favorites']);
                Route::post('update/{id}', [FavoriteController::class,'update'])->name('system.favorites.update')->middleware(['checkRule:edit,favorites']);
                Route::post('delete', [FavoriteController::class,'delete'])->name('system.favorites.delete')->middleware(['checkRule:delete,favorites']);
                Route::post('createJson', [FavoriteController::class,'createJson'])->name('system.favorites.createJson')->middleware(['checkRule:add,favorites']);//
                Route::post('activate', [FavoriteController::class,'activate'])->name('system.favorites.activate')->middleware(['checkRule:activate,favorites']);
                Route::post('deactivate', [FavoriteController::class,'deactivate'])->name('system.favorites.deactivate')->middleware(['checkRule:activate,favorites']);
            });

            //======================================================================================================

            Route::prefix('images/')->middleware(['checkRule:view,images'])->group(function () {
                Route::get('', [ImageController::class,'index'])->name('system.images.index');
                Route::get('create', [ImageController::class,'create'])->name('system.images.create')->middleware(['checkRule:add,images']);
                Route::post('store', [ImageController::class,'store'])->name('system.images.store')->middleware(['checkRule:add,images']);//
                Route::get('/{id}/edit', [ImageController::class,'edit'])->name('system.images.edit')->middleware(['checkRule:edit,images']);
                Route::post('update/{id}', [ImageController::class,'update'])->name('system.images.update')->middleware(['checkRule:edit,images']);
                Route::post('delete', [ImageController::class,'delete'])->name('system.images.delete')->middleware(['checkRule:delete,images']);
                Route::post('createJson', [ImageController::class,'createJson'])->name('system.images.createJson')->middleware(['checkRule:add,images']);//
                Route::post('activate', [ImageController::class,'activate'])->name('system.images.activate')->middleware(['checkRule:activate,images']);
                Route::post('deactivate', [ImageController::class,'deactivate'])->name('system.images.deactivate')->middleware(['checkRule:activate,images']);
            });

            //======================================================================================================

            Route::prefix('testimonials/')->middleware(['checkRule:view,testimonials'])->group(function () {
                Route::get('', [TestimonialController::class,'index'])->name('system.testimonials.index');
                Route::get('create', [TestimonialController::class,'create'])->name('system.testimonials.create')->middleware(['checkRule:add,testimonials']);
                Route::post('store', [TestimonialController::class,'store'])->name('system.testimonials.store')->middleware(['checkRule:add,testimonials']);//
                Route::get('/{id}/edit', [TestimonialController::class,'edit'])->name('system.testimonials.edit')->middleware(['checkRule:edit,testimonials']);
                Route::post('update/{id}', [TestimonialController::class,'update'])->name('system.testimonials.update')->middleware(['checkRule:edit,testimonials']);
                Route::post('delete', [TestimonialController::class,'delete'])->name('system.testimonials.delete')->middleware(['checkRule:delete,testimonials']);
                Route::post('createJson', [TestimonialController::class,'createJson'])->name('system.testimonials.createJson')->middleware(['checkRule:add,testimonials']);//
                Route::post('activate', [TestimonialController::class,'activate'])->name('system.testimonials.activate')->middleware(['checkRule:activate,testimonials']);
                Route::post('deactivate', [TestimonialController::class,'deactivate'])->name('system.testimonials.deactivate')->middleware(['checkRule:activate,testimonials']);
            });


            //======================================================================================================

            Route::prefix('accommodations/')->middleware(['checkRule:view,accommodations'])->group(function () {
                Route::get('', [AccommodationController::class,'index'])->name('system.accommodations.index');
                Route::get('create', [AccommodationController::class,'create'])->name('system.accommodations.create')->middleware(['checkRule:add,accommodations']);
                Route::post('store', [AccommodationController::class,'store'])->name('system.accommodations.store')->middleware(['checkRule:add,accommodations']);//
                Route::get('/{id}/edit', [AccommodationController::class,'edit'])->name('system.accommodations.edit')->middleware(['checkRule:edit,accommodations']);
                Route::post('update/{id}', [AccommodationController::class,'update'])->name('system.accommodations.update')->middleware(['checkRule:edit,accommodations']);
                Route::post('delete', [AccommodationController::class,'delete'])->name('system.accommodations.delete')->middleware(['checkRule:delete,accommodations']);
                Route::post('createJson', [AccommodationController::class,'createJson'])->name('system.accommodations.createJson')->middleware(['checkRule:add,accommodations']);//
                Route::post('activate', [AccommodationController::class,'activate'])->name('system.accommodations.activate')->middleware(['checkRule:activate,accommodations']);
                Route::post('deactivate', [AccommodationController::class,'deactivate'])->name('system.accommodations.deactivate')->middleware(['checkRule:activate,accommodations']);
            });


            //======================================================================================================

            Route::prefix('tourevents/')->middleware(['checkRule:view,tourevents'])->group(function () {
                Route::get('', [ToureventController::class,'index'])->name('system.tourevents.index');
                Route::get('create', [ToureventController::class,'create'])->name('system.tourevents.create')->middleware(['checkRule:add,tourevents']);
                Route::post('store', [ToureventController::class,'store'])->name('system.tourevents.store')->middleware(['checkRule:add,tourevents']);//
                Route::get('/{id}/edit', [ToureventController::class,'edit'])->name('system.tourevents.edit')->middleware(['checkRule:edit,tourevents']);
                Route::post('update/{id}', [ToureventController::class,'update'])->name('system.tourevents.update')->middleware(['checkRule:edit,tourevents']);
                Route::post('delete', [ToureventController::class,'delete'])->name('system.tourevents.delete')->middleware(['checkRule:delete,tourevents']);
                Route::post('createJson', [ToureventController::class,'createJson'])->name('system.tourevents.createJson')->middleware(['checkRule:add,tourevents']);//
                Route::post('activate', [ToureventController::class,'activate'])->name('system.tourevents.activate')->middleware(['checkRule:activate,tourevents']);
                Route::post('deactivate', [ToureventController::class,'deactivate'])->name('system.tourevents.deactivate')->middleware(['checkRule:activate,tourevents']);
            });


            //======================================================================================================

            Route::prefix('partners/')->middleware(['checkRule:view,partners'])->group(function () {
                Route::get('', [PartnerController::class,'index'])->name('system.partners.index');
                Route::get('create', [PartnerController::class,'create'])->name('system.partners.create')->middleware(['checkRule:add,partners']);
                Route::post('store', [PartnerController::class,'store'])->name('system.partners.store')->middleware(['checkRule:add,partners']);//
                Route::get('/{id}/edit', [PartnerController::class,'edit'])->name('system.partners.edit')->middleware(['checkRule:edit,partners']);
                Route::post('update/{id}', [PartnerController::class,'update'])->name('system.partners.update')->middleware(['checkRule:edit,partners']);
                Route::post('delete', [PartnerController::class,'delete'])->name('system.partners.delete')->middleware(['checkRule:delete,partners']);
                Route::post('createJson', [PartnerController::class,'createJson'])->name('system.partners.createJson')->middleware(['checkRule:add,partners']);//
                Route::post('activate', [PartnerController::class,'activate'])->name('system.partners.activate')->middleware(['checkRule:activate,partners']);
                Route::post('deactivate', [PartnerController::class,'deactivate'])->name('system.partners.deactivate')->middleware(['checkRule:activate,partners']);
            });

            //======================================================================================================

            Route::prefix('subscribes/')->middleware(['checkRule:view,subscribes'])->group(function () {
                Route::get('', [SubscribeController::class,'index'])->name('system.subscribes.index');
                Route::get('create', [SubscribeController::class,'create'])->name('system.subscribes.create')->middleware(['checkRule:add,subscribes']);
                Route::post('store', [SubscribeController::class,'store'])->name('system.subscribes.store')->middleware(['checkRule:add,subscribes']);//
                Route::get('/{id}/edit', [SubscribeController::class,'edit'])->name('system.subscribes.edit')->middleware(['checkRule:edit,subscribes']);
                Route::post('update/{id}', [SubscribeController::class,'update'])->name('system.subscribes.update')->middleware(['checkRule:edit,subscribes']);
                Route::post('delete', [SubscribeController::class,'delete'])->name('system.subscribes.delete')->middleware(['checkRule:delete,subscribes']);
                Route::post('createJson', [SubscribeController::class,'createJson'])->name('system.subscribes.createJson')->middleware(['checkRule:add,subscribes']);//
                Route::post('activate', [SubscribeController::class,'activate'])->name('system.subscribes.activate')->middleware(['checkRule:activate,subscribes']);
                Route::post('deactivate', [SubscribeController::class,'deactivate'])->name('system.subscribes.deactivate')->middleware(['checkRule:activate,subscribes']);
            });

            //======================================================================================================

            Route::prefix('steps/')->middleware(['checkRule:view,steps'])->group(function () {
                Route::get('', [StepController::class,'index'])->name('system.steps.index');
                Route::get('create', [StepController::class,'create'])->name('system.steps.create')->middleware(['checkRule:add,steps']);
                Route::post('store', [StepController::class,'store'])->name('system.steps.store')->middleware(['checkRule:add,steps']);//
                Route::get('/{id}/edit', [StepController::class,'edit'])->name('system.steps.edit')->middleware(['checkRule:edit,steps']);
                Route::post('update/{id}', [StepController::class,'update'])->name('system.steps.update')->middleware(['checkRule:edit,steps']);
                Route::post('delete', [StepController::class,'delete'])->name('system.steps.delete')->middleware(['checkRule:delete,steps']);
                Route::post('createJson', [StepController::class,'createJson'])->name('system.steps.createJson')->middleware(['checkRule:add,steps']);//
                Route::post('activate', [StepController::class,'activate'])->name('system.steps.activate')->middleware(['checkRule:activate,steps']);
                Route::post('deactivate', [StepController::class,'deactivate'])->name('system.steps.deactivate')->middleware(['checkRule:activate,steps']);
            });

            //======================================================================================================

            Route::prefix('pages/')->middleware(['checkRule:view,pages'])->group(function () {
                Route::get('', [PageController::class,'index'])->name('system.pages.index');
                Route::get('create', [PageController::class,'create'])->name('system.pages.create')->middleware(['checkRule:add,pages']);
                Route::post('store', [PageController::class,'store'])->name('system.pages.store')->middleware(['checkRule:add,pages']);//
                Route::get('/{id}/edit', [PageController::class,'edit'])->name('system.pages.edit')->middleware(['checkRule:edit,pages']);
                Route::post('update/{id}', [PageController::class,'update'])->name('system.pages.update')->middleware(['checkRule:edit,pages']);
                Route::post('delete', [PageController::class,'delete'])->name('system.pages.delete')->middleware(['checkRule:delete,pages']);
                Route::post('createJson', [PageController::class,'createJson'])->name('system.pages.createJson')->middleware(['checkRule:add,pages']);//
                Route::post('activate', [PageController::class,'activate'])->name('system.pages.activate')->middleware(['checkRule:activate,pages']);
                Route::post('deactivate', [PageController::class,'deactivate'])->name('system.pages.deactivate')->middleware(['checkRule:activate,pages']);
            });

        });

    });









