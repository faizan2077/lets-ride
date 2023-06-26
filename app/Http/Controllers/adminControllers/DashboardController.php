<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\BookingDetails;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bookings;
use App\Models\BussesRouteDetails;
use App\Models\BussStops;
use App\Models\RouteStops;
use App\Models\ContactUs;
use App\Models\Coupon;
use App\Models\CustomerFaq;
use App\Models\Drivers;
use App\Models\Routes;
use App\Models\Safety;
use App\Models\Seats;

class DashboardController extends Controller
{


    public function Dashboard()
    {
        return view('admin.dashboard');
    }
    public function Register()
    {
        return view('admin.register');
    }

    public function Login()
    {
        return view('admin.login');
    }



    function checkLogin(Request $request) {

        if (\Auth::check()) {
            return redirect("/manage-admin/view_customer");

        }

        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(

            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect('manage-admin/view_customer');
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    public function sideBar()
    {
        return view('admin.sidebar');
    }


    public function viewCustomer()
    {
        $user = Customers::get();
        $count = Customers::count();
        return view('admin.view_customer',compact('user','count'));
    }

    public function deleteCustomer($id)
    {
        $user=Customers::find($id);
        $user->delete();
        return back()->with('message','Customer deleted sucessfully!');
    }

    public function addDriver()
    {
        return view('admin.add_drivers');
    }

    public function addDrivers(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'license_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // for driver image
        $image = $request->image;
        $imageName = time() . '.' . $image->Extension();
        $request->image->storeAs('public/drivers', $imageName);

        // for license image
        $license_image = $request->license_image;
        $licenseImageName = time() . '.' . $license_image->Extension();
        $request->license_image->storeAs('public/driver license', $licenseImageName);


        $driver =new Drivers();

        $driver->name = $request->name;
        $driver->email = $request->email;
        $driver->phone = $request->phone;
        $driver->password = $request->password;
        $driver->dob = $request->dob;
        $driver->gender = $request->gender;
        $driver->total_experience = $request->total_experience;
        $driver->license_number = $request->license_number;
        $driver->status = $request->status;
        $driver->image = $imageName;
        $driver->license_image = $licenseImageName;

        $driver->save();

        return back()->with('message','driver add successfully!');
    }

    public function viewDriver()
    {
        $drivers = Drivers::where('verify_identity_st','accepted')->get();

        $pendingDriver = Drivers::where('verify_identity_st','pending')->get();
        $availableDriver = Drivers::where('driver_st','available')->get();


        return view('admin.view_drivers',compact('drivers','pendingDriver','availableDriver'));
    }

    public function availableDriver(Request $request)
    {

        $driver = Drivers::findOrFail($request->driver_id);
    $driver->driver_st = $request->driver_st;
    $driver->save();

        return back()->with('message','Status changed successfully!');
    }

    public function approveDriver($id)
    {
        $acceptDriver = Drivers::find($id);
        $acceptDriver->verify_identity_st = 'accepted';
        $acceptDriver->driver_st = 'available';
        $acceptDriver->rejected_message = null;
        $acceptDriver->save();

        return back()->with('message','Your driver approved successfully!');

    }

    public function rejectDriver(Request $request, $id)
    {
        $rejectDriver = Drivers::find($id);
        $rejectDriver->verify_identity_st = 'rejected';
        $rejectDriver->rejected_message = $request->rejected_message;
        $rejectDriver->save();

        return back()->with('message','Your driver rejected successfully!');

    }



    public function deleteDriver($id)
    {
        $driver = Drivers::find($id);
        $driver->delete();
        return back()->with('message','Driver deleted sucessfully!');
    }

    public function addBookings()
    {
        return view('admin.add_bookings');
    }

    public function bookingAdd(Request $request)
    {
        $booking =new Bookings();
        $booking->ticket_no = $request->ticket_no;
        $booking->buss_id = $request->buss_id;
        $booking->pickup_buss_stop_id = $request->pickup_buss_stop_id;
        $booking->dropoff_buss_stop_id = $request->dropoff_buss_stop_id;
        $booking->route_id = $request->route_id;
        $booking->driver_id = $request->driver_id;
        $booking->customer_id = $request->customer_id;
        $booking->customer_name = $request->customer_name;
        $booking->total_passengers = $request->total_passengers;
        $booking->total_seats = $request->total_seats;

        $booking->save();

        return back()->with('message','bookings add successfully!');
    }

    public function viewBookings()
    {
        $bookings = Bookings::get();
        return view('admin.view_bookings',compact('bookings'));
    }

    public function deleteBookings($id)
    {
        $bookings = Bookings::find($id)->delete();
        return back()->with('message','Booking deleted sucessfully!');

    }

    public function viewPassengerDetails()
    {
        $passengerDetails = BookingDetails::get();
        return view('admin.passenger_details',compact('passengerDetails'));
    }

    public function deletePassengerDetails($id)
    {
        $passengerDetails = BookingDetails::find($id)->delete();
        return back()->with('message','Passenger deleted sucessfully!');
    }

    public function addRoutes()
    {
        return view('admin.add_bus_routes');
    }

    public function viewRoutes()
    {
        $routes = Routes::get();
        return view('admin.view_bus_routes',compact('routes'));
    }


    public function addRoute(Request $request)
    {
        $routes = new Routes();

        $routes->title = $request->title;
        $routes->code = $request->code;
        $routes->status = $request->status;
        $routes->save();

        return back()->with('message', 'Route add successfully!');
    }

    public function deleteRoutes($id)
    {
        $routes = Routes::find($id)->delete();
        return back()->with('message','Route deleted sucessfully!');

    }
    
     public function editRoutes($id)
    {
        $editRoute = Routes::find($id);

        return view('admin.edit_bus_routes',compact('editRoute'));
    }

    public function updateRoute(Request $request,$id)
    {
        $routes =Routes::find($id);

        $routes->title = $request->title;
        $routes->code = $request->code;
        $routes->save();

        return back()->with('message', 'Route updated successfully!');
    }


public function goAddRouteStops($id)
    {
        // Retrieve the necessary data for the dropdown menu, e.g., options
        // dd($id);
        $stopList = Routes::get();
        return view('admin.add_route_stops',compact('stopList'), [
            'id' => $id,
            // 'options' => $options,
        ]);
    }
    
    public function addStops()
    {
        return view('admin.add_bus_stops');
    }

    public function viewStops()
    {
        $stops = BussStops::get();
        return view('admin.view_bus_stops',compact('stops'));
    }

    public function addStop(Request $request)
    {
        $stops = new BussStops();

        $stops->title = $request->title;
        $stops->short_title = $request->short_title;
        $stops->latitude = $request->latitude;
        $stops->longitude = $request->longitude;
        $stops->status = $request->status;
        $stops->save();

        return back()->with('message', 'Stop add successfully!');
    }

    public function deleteStops($id)
    {
        $routes = BussStops::find($id)->delete();
        return back()->with('message','Stop deleted sucessfully!');

    }
    
    public function editStops($id)
    {
        $editStop = BussStops::find($id);
        // dd($editStop);
        return view('admin.edit_buss_stops',compact('editStop'));
    }

    public function updateStops(Request $request,$id)
    {
        $stops = BussStops::find($id);

        $stops->title = $request->title;
        $stops->short_title = $request->short_title;
        $stops->latitude = $request->latitude;
        $stops->longitude = $request->longitude;
        $stops->save();

        return back()->with('message', 'Stop updated successfully!');
    }


    public function bussLinktoRoute()
    {
        return view('admin.buss_link_to_route');
    }

    public function addBussLinktoRoute(Request $request)
    {
        $this->validate($request, array(
            'buss_id' => "required|exists:busses,id",
            'route_id' => "required|exists:routes,id",
            'driver_id' => "required||exists:drivers,id",
          ));

        $bussRouteDetail = BussesRouteDetails::where([
            "buss_id" => $request["buss_id"]
        ])
        ->orWhere([
            "route_id" => $request["route_id"]
        ])
        ->first();

        if ($bussRouteDetail) {
        return back()->with('error','This route or buss is already occupied. Please cancel its route or try with another combination.');
        }

        if (BussesRouteDetails::create([
            "buss_id" => $request["buss_id"],
            "route_id" => $request["route_id"],

        ]))

        {
            return back()->with('message','Route assigned to the buss successfully.');
        }

            return back()->with('error','Route unable to assign to buss. Something went wrong.');

        }

    public function viewBussLinkToRoute()
    {
        $bussRouteDetail = BussesRouteDetails::get();
        return view('admin.view_buss_link_to_route',compact('bussRouteDetail'));
    }

    public function deleteBussLinktoRoute($id)
        {
            $bussRouteDetail = BussesRouteDetails::find($id)->delete();
            return back()->with('message','Buss Link to route deleted sucessfully!');

        }


    public function addCoupons()
    {
        return view('admin.add_coupons');
    }

    public function viewCoupons()
    {
        $coupon = Coupon::get();
        return view('admin.view_coupons',compact('coupon'));
    }

    public function addCoupon(Request $request)
    {
        $coupon = new Coupon();

        $coupon->coupon_number = $request->coupon_number;
        $coupon->type = $request->type;
        $coupon->discount = $request->discount;
        $coupon->expiry_date = $request->expiry_date;
        $coupon->status = $request->status;

        $coupon->save();

        return back()->with('message', 'Coupon add successfully!');
    }

    public function deleteCoupons($id)
    {
        $coupon = Coupon::find($id)->delete();
            return back()->with('message','Coupon deleted sucessfully!');
    }

    public function addSeats()
    {
        return view('admin.add_seats');
    }

    public function addSeat(Request $request)
    {
        $seats = new Seats();

        $seats->seat_no = $request->seat_no;
        $seats->buss_id = $request->buss_id;
        $seats->status = $request->status;

        $seats->save();

        return back()->with('message', 'Seat add successfully!');
    }

    public function viewSeats()
    {
        $seats = Seats::get();
        return view('admin.view_seats',compact('seats'));
    }

    public function deleteSeats($id)
    {
        $seats = Seats::find($id)->delete();
        return back()->with('message','Seat deleted sucessfully!');

    }

    public function busesTravelHistory()
    {
        return view('admin.buses_travel_history');
    }

    public function AddbusesRouteDetails()
    {
        return view('admin.add_buses_route_details');
    }



    public function subscriptionDetails()
    {
        return view('admin.subscription_details');
    }

    public function ePaymentSystem()
    {
        return view('admin.e_payment_system');
    }

    public function customerFaq()
    {
        $getFaq = CustomerFaq::get();
        return view('admin.view_faq',compact('getFaq'));
    }

    public function addFaq(Request $request)
    {
        return view('admin.addFaqs');
    }

    public function addQuestion (Request $request)
    {
        $addQuestion = new CustomerFaq();

        $addQuestion->question = $request->question;
        $addQuestion->answer = $request->answer;

        $addQuestion->save();

        return back()->with('message','Question add successfully!');
    }

    public function deleteFaq($id)
    {
        $deleteFaq = CustomerFaq::find($id)->delete();
        return back()->with('error','Question deleted successfully!');
    }

    public function editFaq($id)
    {
        $editFaq = CustomerFaq::find($id);
        return view('admin.edit_faq',compact('editFaq'));
    }

    public function updateFaq($id,Request $request)
    {
        $updateQuestion = CustomerFaq::find($id);

        $updateQuestion->question = $request->question;
        $updateQuestion->answer = $request->answer;

        $updateQuestion->save();

        return redirect('/manage-admin/view-faq')->with('message','Question updated successfully!');
    }

    public function getSaftey()
    {
        $getSafety = Safety::get();
        return view('admin.view_safety',compact('getSafety'));
    }

    public function addSafety()
    {
        return view('admin.add_safety');
    }

    public function addSafetyInstruction(Request $request)
    {
        $addSafety = new Safety();

        $addSafety->saftey_message = $request->saftey_message;

        $addSafety->save();

        return back()->with('message','Safety added successfully!');
    }

    public function editSafety($id)
    {
        $editSafety = Safety::find($id);
        return view('admin.edit_safety',compact('editSafety'));
    }

    public function updateSafety(Request $request,$id)
    {
        $updateSafety = Safety::find($id);

        $updateSafety->saftey_message = $request->saftey_message;
        $updateSafety->save();

        return redirect('/manage-admin/get-safety')->with('message','Safety updated successfully!');
    }

    public function contactUs()

    {
        $getContact = ContactUs::get();

        return view('admin.contact_us',compact('getContact'));
    }
    
    
     public function addRouteStops()
    {
        $stopList = \DB::table("routes")->get();
        $id ="";
        return view('admin.add_route_stops',compact('stopList','id'));

    }

    public function routeStopsAddWeb(Request $request)
    {

        $routeId =$request->route_id;
        $sortOrder = $request->sort_order;
        foreach ($request->addMoreInputFields as $key => $value) {
            $value['route_id'] = $routeId;
            $value['sort_order'] = $sortOrder;
            RouteStops::create($value);
        }

        return back()->with('message','Add route stops successfully!');
    }

    public function viewRouteStops()
    {
        $getData = DB::table('route_stops')
                    ->join('routes','routes.id','=','route_stops.route_id')
                    ->distinct()
                    // ->join('buss_stops','buss_stops.id','=','route_stops.buss_stop_id')
                    ->get(['routes.id as route_id','routes.title as route_title']);
        // dd($getData);
        return view('admin.view_route_stops',compact('getData'));
    }

    public function getRouteStops($routeId)
{
    $busStops = DB::table('route_stops')
                    ->join('buss_stops', 'buss_stops.id', '=', 'route_stops.buss_stop_id')
                    ->where('route_stops.route_id', $routeId)
                    ->select('route_stops.id','buss_stops.title')
                    ->get();

    return view('admin.route_stops', compact('busStops'));
}

public function deleteRouteStop($id)
{
    $deleteRouteStop = RouteStops::find($id)->delete();

    return back()->with('message','Route Stops deleted successfully!');
}


 public function getStopsById()
    {
        $getStops = BussStops::get();
        return response()->json(['code'=>200,'status'=>"success","message"=>"Stops fetched successfully!",'data'=>$getStops]);

    }
    
     public function routeStopsAdd(Request $request)
    {

        $routeId =$request->route_id;
        $sortOrder = $request->sort_order;
        foreach ($request->addMoreInputFields as $key => $value) {
            $value['route_id'] = $routeId;
            $value['sort_order'] = $sortOrder;
            RouteStops::create($value);
        }

        return response()->json(['code'=>200,'status'=>"success",'message'=>"Route stops added successfully!"]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }



}
