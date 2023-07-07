<?php

use App\Http\Controllers\adminControllers\BusesController;
use App\Http\Controllers\adminControllers\ContactController;
use App\Http\Controllers\adminControllers\DashboardController;
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

Route::get('/login', function () {
    return redirect("/manage-admin/login");
});

Route::group(['prefix' => 'manage-admin'], function () {


    Route::post('/admin_login', [DashboardController::class, 'checkLogin']);
    Route::get('/login', [DashboardController::class, 'Login'])->name('login');
});

Route::get('/test-stops', [DashboardController::class, 'addAPIForRoutes']);
Route::get('/faqs', [DashboardController::class, 'getFaqApi']);
Route::get('/contact-info', [ContactController::class, 'getContactApi']);


Route::group(['prefix' => 'manage-admin', 'middleware' => ['auth']], function () {

    //dashboard route
    Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');

    Route::get('/side_bar', [DashboardController::class, 'sideBar']);
    Route::get('/view_customer', [DashboardController::class, 'viewCustomer'])->name('view-customer');
    Route::get('/delete_customer/{id}', [DashboardController::class, 'deleteCustomer'])->name('delete-customer');

    // Driver routes
    Route::get('/add_driver', [DashboardController::class, 'addDriver'])->name('add-driver');
    Route::get('/view_driver', [DashboardController::class, 'viewDriver'])->name('view-driver');
    Route::post('/add_drivers', [DashboardController::class, 'addDrivers'])->name('add-drivers');
    Route::get('/accept-driver/{id}', [DashboardController::class, 'approveDriver'])->name('approve-driver');
    Route::get('/reject-driver/{id}', [DashboardController::class, 'rejectDriver'])->name('reject-driver');
    Route::get('/available-driver', [DashboardController::class, 'availableDriver'])->name('available-driver');
    Route::get('/delete_driver/{id}', [DashboardController::class, 'deleteDriver'])->name('delete-driver');
    // Route::post('/reject-message/{id}',[DashboardController::class,'rejectMessage'])->name('reject-message');

    //Bookings routes
    Route::get('/add_bookings', [DashboardController::class, 'addBookings'])->name('add-bookings');
    Route::post('/booking-add', [DashboardController::class, 'bookingAdd'])->name('booking-add');
    Route::get('/view_bookings', [DashboardController::class, 'viewBookings'])->name('view-bookings');
    Route::get('/view-passenger-details', [DashboardController::class, 'viewPassengerDetails'])->name('view-passenger-details');
    Route::get('/delete_bookings/{id}', [DashboardController::class, 'deleteBookings'])->name('delete-bookings');
    Route::get('/delete-passenger-details/{id}', [DashboardController::class, 'deletePassengerDetails'])->name('delete-passenger-details');

    // buss routes route
    Route::get('/add_routes', [DashboardController::class, 'addRoutes'])->name('add-routes');
    Route::get('/view_routes', [DashboardController::class, 'viewRoutes'])->name('view-routes');
    Route::post('/add_route', [DashboardController::class, 'addRoute'])->name('add-route');
    Route::get('/delete_routes/{id}', [DashboardController::class, 'deleteRoutes'])->name('delete-routes');

    Route::get('/edit_routes/{id}', [DashboardController::class, 'editRoutes'])->name('edit-routes');
    Route::post('/update_route/{id}', [DashboardController::class, 'updateRoute'])->name('update-route');
    Route::get('/go-add-route-stops/{id}', [DashboardController::class, 'goAddRouteStops'])->name('go-add-route-stops');
    // Buss stops route
    Route::get('/add_stops', [DashboardController::class, 'addStops'])->name('add-stops');
    Route::get('/view_stops', [DashboardController::class, 'viewStops'])->name('view-stops');
    Route::post('/add_stop', [DashboardController::class, 'addstop'])->name('add-stop');
    Route::get('/delete_stops/{id}', [DashboardController::class, 'deleteStops'])->name('delete-stops');

    Route::get('/edit_stops/{id}', [DashboardController::class, 'editStops'])->name('edit-stops');
    Route::post('/update_stops/{id}', [DashboardController::class, 'updateStops'])->name('update-stops');

    // buss link to route
    Route::get('/view_buss_link_to_route', [DashboardController::class, 'viewBussLinkToRoute'])->name('view-buss-link-to-route');
    Route::get('/buss_link_to_route', [DashboardController::class, 'bussLinktoRoute'])->name('buss-link-to-route');
    Route::post('/add_buss_link_to_route', [DashboardController::class, 'addBussLinktoRoute'])->name('add-buss-link-to-route');
    Route::get('/delete_buss_link_to_route/{id}', [DashboardController::class, 'deleteBussLinktoRoute'])->name('delete-buss-link-to-route');

    // Coupons Details routes
    Route::get('/add-coupons', [DashboardController::class, 'addCoupons'])->name('add-coupons');
    Route::get('/view-coupons', [DashboardController::class, 'viewCoupons'])->name('view-coupons');
    Route::post('/add_coupon', [DashboardController::class, 'addCoupon'])->name('add-coupon');
    Route::get('/delete-coupons/{id}', [DashboardController::class, 'deleteCoupons'])->name('delete-coupons');

    // Buss seats routes
    Route::get('/add-seats', [DashboardController::class, 'addSeats'])->name('add-seats');
    Route::get('/view-seats', [DashboardController::class, 'viewSeats'])->name('view-seats');
    Route::post('/add-seat', [DashboardController::class, 'addSeat'])->name('add-seat');
    Route::get('/delete-seats/{id}', [DashboardController::class, 'deleteSeats'])->name('delete-seats');

    Route::get('/add_buses_route_details', [DashboardController::class, 'AddbusesRouteDetails'])->name('add-buses-route-details');
    Route::get('/buses_route_details', [DashboardController::class, 'busesRouteDetails'])->name('buses-route-details');
    Route::get('/buses_travel_history', [DashboardController::class, 'busesTravelHistory'])->name('buses-travel-history');


    // route according to use cases
    Route::get('/add_buses_management', [BusesController::class, 'AddbusesManagement'])->name('add-buses-management');
    Route::get('/buses_management', [BusesController::class, 'busesManagement'])->name('buses-management');
    Route::post('/add_buses_details', [BusesController::class, 'AddBusesDetails'])->name('add_buses_details');
    Route::get('/delete_buss/{id}', [BusesController::class, 'deleteBuss'])->name('delete-buss');
    Route::get('/assign-direct-route/{id}', [BusesController::class, 'AssignDirectRoute']);

    // subscription details
    Route::get('/subscription_details', [DashboardController::class, 'subscriptionDetails'])->name('subscription-details');


    // Payments routes

    Route::get('/e_payment_system', [DashboardController::class, 'ePaymentSystem'])->name('e-payment-system');

    // Faq's routes
    Route::get('/add-faq', [DashboardController::class, 'addFaq'])->name('add-faq');
    Route::post('/add-question', [DashboardController::class, 'addQuestion'])->name('add-question');
    Route::get('/view-faq', [DashboardController::class, 'customerFaq'])->name('view-faq');
    Route::get('/delete-faq/{id}', [DashboardController::class, 'deleteFaq'])->name('delete-faq');
    Route::get('/edit-faq/{id}', [DashboardController::class, 'editFaq'])->name('edit-faq');
    Route::post('/update-faq/{id}', [DashboardController::class, 'updateFaq'])->name('update-faq');

    // safety routes
    Route::get('/get-safety', [DashboardController::class, 'getSaftey'])->name('view-safety');
    Route::get('/add-safety', [DashboardController::class, 'addSafety'])->name('add-safety');
    Route::post('/add-safety-instruction', [DashboardController::class, 'addSafetyInstruction'])->name('add-safety-instruction');
    Route::get('/edit-safety/{id}', [DashboardController::class, 'editSafety'])->name('edit-safety');
    Route::post('/update-safety/{id}', [DashboardController::class, 'updateSafety'])->name('update-safety');

    // contact us routes
    Route::get('/contact-us', [DashboardController::class, 'contactUs'])->name('contact-us');
    // Logout route
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logoutadmin');


    // Route by faizan => contact us
    Route::get('/contact-info', [ContactController::class, 'getContact'])->name('contact-info');
    Route::post('/add-contact-info', [ContactController::class, 'addContactInfo'])->name('add-contact-info');



    // new work start here 5/24/2023
    // add route stops

    Route::get('/view-route-stops', [DashboardController::class, 'viewRouteStops'])->name('view-route-stops');
    Route::get('/add-route-stops', [DashboardController::class, 'addRouteStops'])->name('add-route-stops');
    Route::post('/route-stops-add', [DashboardController::class, 'routeStopsAdd'])->name('route-stops-add');
    Route::get('/delete_route_stop/{id}', [DashboardController::class, 'deleteRouteStop'])->name('delete-route-stop');
    Route::get('/route-stops/{route_id}', [DashboardController::class, 'getRouteStops'])->name('routeStops');
});


Route::get('/login', function () {
    return view('login');
});
