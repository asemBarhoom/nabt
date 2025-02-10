<?php

use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DestinationController;
use App\Http\Controllers\API\ToureventController;
use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\SubscribeController;
use App\Http\Controllers\API\StepController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\AccommodationController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\LandmarkController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\CancellationController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\RewardController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\PointController;
use App\Http\Controllers\API\InboxController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\WheelyController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\SystemAdminController;
use App\Http\Controllers\API\NumberController;
use App\Http\Controllers\API\InvoiceController;
use App\Http\Controllers\API\RedemptionController;
use App\Http\Controllers\API\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('settings' , [SettingController::class,'index']);
Route::get('testimonials' , [TestimonialController::class,'index']);
Route::apiResource('categories' , CategoryController::class);
Route::apiResource('destinations' , DestinationController::class);
Route::apiResource('tourevents' , ToureventController::class);
Route::get('partners' , [PartnerController::class,'index']);
Route::get('steps' , [StepController::class,'index']);
Route::apiResource('posts' , PostController::class);
Route::apiResource('pages' , PageController::class);
Route::post('subscribe' , [SubscribeController::class,'store']);
Route::get('home_page_hero_section' , [PageController::class,'heroSection']);
Route::get('home_page_aboutUs_section' , [PageController::class,'AboutUsSection']);
Route::get('home_page_steps_section' , [PageController::class,'StepsSection']);
Route::get('about_us' , [PageController::class,'aboutUs']);
Route::get('contact_us' , [PageController::class,'contactUs']);
Route::apiResource('countries' , CountryController::class);
Route::apiResource('accommodations' , AccommodationController::class);
Route::apiResource('landmarks' , LandmarkController::class);
Route::apiResource('rewards' , RewardController::class);
Route::post('login', [AuthController::class, 'login']);
Route::get('events' , [EventController::class,'index']);
Route::get('faqs' , [FaqController::class,'index']);
Route::get('status-flow', [\App\Models\Booking::class, 'getStatusFlow']);
Route::post('/inboxes', [InboxController::class, 'store']);
Route::get('/system_admins', [SystemAdminController::class, 'index']);
Route::get('/numbers', [NumberController::class, 'index']);

Route::group([
    'middleware' => ['auth:api'],
], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('logoutFromAllDevices', [AuthController::class, 'logoutFromAllDevices']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('profile', [AuthController::class, 'updateProfile']);
    Route::post('profile/image', [AuthController::class, 'updateImage']);
    Route::post('update_user_address', [AuthController::class, 'update_address']);
    Route::apiResource('bookings' , BookingController::class);
    Route::apiResource('statuses' , StatusController::class);

    Route::get('/favorites', [FavoriteController::class, 'index']);       // favorites
    Route::post('/favorites', [FavoriteController::class, 'store']);       // Add favorite
    Route::delete('/favorites', [FavoriteController::class, 'destroy']);  // Remove favorite

    Route::get('cancellations' , [CancellationController::class,'index']);
    Route::post('/cancellations', [CancellationController::class, 'store']);       // Add cancellation

    Route::get('notifications/seen', [NotificationController::class,'seen']);
    Route::get('notifications/not-seen', [NotificationController::class,'notSeen']);
    Route::apiResource('notifications', NotificationController::class);
    Route::post('notifications/markAsRead', [NotificationController::class,'markAsRead']);
    Route::post('notifications/markAllAsRead', [NotificationController::class,'markAllAsRead']);

    Route::post('activities/markAsRead', [ActivityController::class,'markAsRead']);
    Route::post('activities/markAllAsRead', [ActivityController::class,'markAllAsRead']);

    Route::apiResource('activities' , ActivityController::class);
    Route::apiResource('tickets' , TicketController::class);
    Route::apiResource('points' , PointController::class);

    Route::post('/forms', [FormController::class, 'store']);
    Route::post('/wheelies', [WheelyController::class, 'store']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::post('/restaurants', [RestaurantController::class, 'store']);

    Route::post('testimonials' , [TestimonialController::class,'store']);
    Route::apiResource('invoices' , InvoiceController::class);

    Route::post('/redemptions/auto-redeem', [RedemptionController::class, 'autoRedeem'])->name('redemptions.autoRedeem');

});
