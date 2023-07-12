<?php

use App\Http\Controllers\api\Admin\BookingDetailsController;
use App\Http\Controllers\api\Admin\BookingsController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\Admin\BussesController;
use App\Http\Controllers\api\Admin\BussesSeatController;
use App\Http\Controllers\api\Admin\BussStopController;
use App\Http\Controllers\api\Admin\CouponController;
use App\Http\Controllers\api\Admin\GetBussessRouteController;
use App\Http\Controllers\api\Admin\RouteController;
use App\Http\Controllers\api\DriverController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\adminControllers\DashboardController;
use App\Http\Controllers\api\Admin\SubscriptionController;
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
 

//Customers Routes
Route::group(["prefix" => "customer", "middleware" => ["appauth"]], function () {
    //All Public Routes
    Route::post('/signup', [CustomerController::class, 'register']);
    Route::post('/verify-signup', [CustomerController::class, 'verifySignup']);
    Route::post('/login', [CustomerController::class, 'login']);
    Route::post('/forget-password', [CustomerController::class, 'forgetPassword']);
    Route::post('/reset-password', [CustomerController::class, 'resetPassword']);
    Route::post('show-bookings',[BookingsController::class,'showBookings']);
      
     // new api module start here

Route::post('/add-packages',[SubscriptionController::class,'addPackages']);
Route::get('/get-packages',[SubscriptionController::class,'getPackages']);
Route::post('/delete-packages',[SubscriptionController::class,'deletePackages']);

// subscription users

Route::post('/user-subscription-package',[SubscriptionController::class,'userSubscriptionPackage']);
Route::get('/get-user-subscriptions',[SubscriptionController::class,'getUserSubscriptions']);

// add credit
Route::post('/add-credit',[SubscriptionController::class,'addCredit']);
Route::get('/get-credit',[SubscriptionController::class,'getCredit']);

Route::post('/add-user-rides',[SubscriptionController::class,'addUserRide']);
Route::post('/view-user-rides',[SubscriptionController::class,'viewUserRide']);

    //Auth Protected API(s)
    Route::group(["middleware" => ["customer_auth"]], function () {
        Route::post('/update/profile', [CustomerController::class, 'updateProfile']);
        Route::post('/logout', [CustomerController::class, 'logout']);
    });
});


//Drivers Routes Api(s)
Route::group(["prefix" => "driver", "middleware" => ["appauth"]], function () {
    //All Public Routes
    Route::post('/signup', [DriverController::class, 'register']);
    Route::post('/verify-signup', [DriverController::class, 'verifySignup']);
    Route::post('/login', [DriverController::class, 'login']);
    Route::post('/forget-password', [DriverController::class, 'forgetPassword']);
    Route::post('/reset-password', [DriverController::class, 'resetPassword']);

    //Auth Protected API(s)
    Route::group(["middleware" => ["driver_auth"]], function () {
        Route::post('/update/profile', [DriverController::class, 'updateProfile']);
       Route::post('/verify-identity',[DriverController::class,'identityVerify']);
     
        Route::post('/logout', [DriverController::class, 'logout']);
    });
});



//Admin Routes
Route::group(["prefix" => "admin", "middleware" => ["appauth"]], function () {
    //All Public Routes
    Route::post('/add-buss', [BussesController::class, 'store']);
    Route::post('/add-buss-stop', [BussStopController::class, 'store']);
    Route::post('/add-route', [RouteController::class, 'store']);
    Route::post('/link-buss-to-route', [RouteController::class, 'linkBussToRoute']);

    //Search Routes
    Route::post('/find-buss-stop', [BussStopController::class, 'findBussStop']);

    // Seat Routes
    Route::post('/add-seat',[BussesSeatController::class, 'seats']);
    Route::get('/show_seats/{buss_id}',[BussesSeatController::class,'showSeats']);
    // bookings Routes
    Route::post('/add-bookings',[BookingsController::class,'bookings']);
    Route::post('booking-details',[BookingDetailsController::class,'bookingDetails']);
    Route::post('/cancel-booking',[BookingsController::class,'cancelBookings']);
    Route::post('/add-wallet-payment',[PaymentController::class,'AddWalletPayment']);
    Route::post('/reedem-wallet-payment',[PaymentController::class,'reedemWalletPayment']);
  
    // data get api
    Route::post('/get-busses-route',[GetBussessRouteController::class,'getBussesRoute']);

    // Coupon Api
    Route::post('add-coupon',[CouponController::class,'addCoupon']);
    // Apply Coupon
    Route::post('apply-coupon',[CouponController::class,'applyCoupon']);

    Route::post('/find-buss-route', [BookingsController::class, 'getRoutes']);
    Route::post('/user-bookings',[BookingsController::class,'userBookings']);

    Route::post('/view-verify-identity',[DriverController::class,'viewVerifyIdentity']);
    Route::post('/get-link-driver-to-buss', [DriverController::class, 'getLinkDriverToBuss']);
    
    Route::post('/get-passenger-details',[BookingsController::class,'getPassengerDetails']);
    
     // get faq and safety api
    Route::get('/get-faq',[CustomerController::class,'getFaq']);
    Route::get('/get-safety',[CustomerController::class,'getSafety']);

    // customer contact us api

    Route::post('/contact-us',[CustomerController::class,'contactUs']);
    
});

// maintainacnece api

 Route::get('get/maintenance/mode',[DriverController::class,'getMaintenanceMode']);
 Route::get('get/ios/maintenance/mode',[DriverController::class,'getMaintenanceModeForIOS']);
Route::get('/get-stops-by-id',[DashboardController::class,'getStopsById']);
Route::post('/route-stops-add',[DashboardController::class,'routeStopsAdd'])->name('route-stops-add');

