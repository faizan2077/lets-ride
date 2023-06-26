<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Http\Requests\API\Admin\Busses\BookingsRequest;
use App\Models\Bookings;
use App\Models\Busses;
use App\Models\RefundDetails;
use App\Models\BussStops;
use App\Models\RouteStops;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller {

    protected $BookingService;

    public function __construct(BookingService $BookingService) {
        $this->BookingService = $BookingService;
    }

    public function bookings(BookingsRequest $request) {
        
        //   $seat_no = $request['seat_no'];

        //     $changeSt = DB::table('seats')->where('seat_no',$seat_no)->get(['status']);

        //     if($changeSt)
        //         {
        //             DB::table('seats')
        //             ->where('seat_no',$seat_no)
        //             ->update([
        //              'status' =>  '1',
        //             ]);
        //         }
        
        // return $this->BookingService->bookings($request->all());
        
        
        
         $seat_no = $request['seat_no'];

        // dd($seat_no);
            $exp = explode(',',$seat_no);

            // dd($exp);
            foreach ($exp as $memu) {
               $data =  $memu;
                //  dd ($data);
               $changeSt = DB::table('seats')->where('seat_no',$data)->get();
                // echo $changeSt." ";

               if($changeSt)
               {


                   DB::table('seats')
                   ->where('seat_no',$data)
                   ->update([
                    'status' =>  '1',
                   ]);
               }
         }




        return $this->BookingService->bookings($request->all());
    }

// get routes api old is ok now comment this 6/5/2023 
    // public function getRoutes(Request $request) {

    //     $routeIds = DB::table("route_stops")
    //             ->where("buss_stop_id", $request["origin_buss_stop_id"])
    //             ->orWhere("buss_stop_id", $request["destination_buss_stop_id"])
    //             ->pluck("route_id");

    //     $routes = DB::table("routes")
    //                     ->whereIn("id", $routeIds)->get();

    //     $response = [];

    //     foreach ($routes as $route) {
    //         $routeStops = DB::table("route_stops as rs")->selectRaw("bs.title, bs.latitude, bs.longitude, rs.arrived_at")
    //                 ->join("buss_stops as bs", "bs.id", "rs.buss_stop_id")
    //                 ->where("rs.route_id", $route->id)
    //                 ->get();
    //         $buss = DB::table("busses_route_details as brd")
    //                 ->selectRaw("b.*")
    //                 ->join("busses as b", "b.id", "brd.buss_id")
    //                 ->where("brd.route_id", $route->id)
    //                 ->get();
            
    //           $seats = DB::table('seats')
    //                         ->where('status',0)
    //                         ->count();        
                    
    //         $response[] = array(
    //             "route_id" => $route->id,
    //             "route_title" => $route->title,
    //             "route_code" => $route->code,
    //             "buss_details" => $buss->toArray(),
    //             "route_buss_stops" => $routeStops->toArray(),
    //             "remaining_seats"=> $seats,
    //         );
    //     }

    //     return response()->json([
    //                 'code' => 200,
    //                 'status' => 'Success',
    //                 'message' => 'Routes fetched successfully.',
    //                 'data' => $response], 200);
    // }

    public function getRoutes(Request $request) {

        $routeIds = DB::table("routes")
                ->pluck("id");

        $routes = DB::table("routes")
                        ->whereIn("id", $routeIds)->get();

        $response = [];

        foreach ($routes as $route) {
            $routeStops = DB::table("route_stops as rs")->selectRaw("bs.title, bs.latitude, bs.longitude, rs.arrived_at")
                    ->join("buss_stops as bs", "bs.id", "rs.buss_stop_id")
                    ->where("rs.route_id", $route->id)
                    ->get();
            $buss = DB::table("busses_route_details as brd")
                    ->selectRaw("b.*")
                    ->join("busses as b", "b.id", "brd.buss_id")
                    ->where("brd.route_id", $route->id)
                    ->get();
            
              $seats = DB::table('seats')
                            ->where('status',0)
                            ->count();        
                    
            $response[] = array(
                "route_id" => $route->id,
                "route_title" => $route->title,
                "route_code" => $route->code,
                "buss_details" => $buss->toArray(),
                "route_buss_stops" => $routeStops->toArray(),
                "remaining_seats"=> $seats,
            );
        }

        return response()->json([
                    'code' => 200,
                    'status' => 'Success',
                    'message' => 'Routes fetched successfully.',
                    'data' => $response], 200);
    }



    public function userBookings(Request $request)
    {
        // $userBookings = Bookings::get();
        // return response()->json([
        //     'data' => $userBookings,
        // ]);

//         $userBookings = DB::table('customers')
//         ->join('bookings', 'customers.id', '=', 'bookings.customer_id')
//         ->where('customers.id','8')
//         ->select('bookings.*')
//         ->get();

//         $userDetails = DB::table('bookings')
//         ->join('booking_details','bookings.id', '=', 'booking_details.booking_id')
//         ->where('bookings.customer_id','8')
//         ->select('booking_details.booking_id','booking_details.passenger_name','booking_details.passenger_cnic')
//         ->get();

// return response()->json([
//             'data' => $userBookings,
//             'userDetails' => $userDetails
//         ]);


        $customerIds = DB::table("bookings")
        ->where("customer_id", $request["find_customer"])
        ->pluck("customer_id");

        $customers = DB::table("customers")
                    ->whereIn("id", $customerIds)->get();

        $response = [];

        foreach ($customers as $customer) {

            $bookings = DB::table("booking_details as bd")
            ->selectRaw("b.*")
            ->join("bookings as b", "b.id", "bd.booking_id")
            ->where("b.customer_id", $customer->id)
            ->get();

            $bookingDetails = DB::table("bookings as rs")->selectRaw("bs.booking_id,bs.passenger_name,bs.passenger_phone, bs.passenger_cnic, bs.passenger_age, rs.total_fare")
            ->join("booking_details as bs", "bs.booking_id", "rs.id")
            ->where("rs.customer_id", $customer->id)
            ->get();


        $response[] = array(
        "customer_id" => $customer->id,
        "customer_name" => $customer->name,
        "customer_phone" => $customer->phone,
        "customer_email" =>$customer->email,
        "bookings" => $bookings->toArray(),
        "booking_details" => $bookingDetails->toArray()
        );

        }

        return response()->json([
            'code' => 200,
            'status' => 'Success',
            'message' => 'Booking details successfully.',
            'data' => $response], 200);

            }
            
            
             // get passenger detail api

            public function getPassengerDetails(Request $request)
            {
                     if(isset($request['seat_id']) && !empty($request['seat_id']))

                    {

                    $seat_id = $request['seat_id'];

                        $passenger = DB::select('select * from booking_details where seat_id= ?', [$seat_id]);
                        if($passenger)
                        {
                            return response()->json(['status'=>'success','Success'=>'Passenger details fetched successfully!.', 'data'=>$passenger]);
                        }
                        else
                        {
                            return response()->json(['status'=>'failed','error'=>'No seat id Exists.']);
                        }
                    }
                    else
                    {
                        return response()->json(['status'=>'failed','error'=>'Incomplete Parameters']);
                    }
            }
            
            
            public function showBookings(Request $request)
       {

           if (isset($request['customer_id']) && !empty($request['customer_id'])) {

               $room_creator = $request['customer_id'];
               // dd($room_creator);
               $getData = DB::table('bookings')
               
                 ->join('buss_stops as bs','bs.id','=','bookings.pickup_buss_stop_id')
                ->join('buss_stops','buss_stops.id','=','bookings.dropoff_buss_stop_id')
                ->where('customer_id',$room_creator)
               ->get(['bs.title as pickup_buss_stop','buss_stops.title as dropoff_buss_stop','bookings.*']);
               

               if ($getData) {
                   foreach ($getData as $data) {
                       $room_id_get = DB::table("bookings as ms")->selectRaw("ms.id, ms.customer_id")
                           ->where("ms.id", $data->id)
                           ->get(['id']);

                       // dd($room_id_get);
                       if ($room_id_get) {


                           $atg = array();
                           //  dd($arr);
                           foreach ($room_id_get as $in) {
                            $cst = $in->id;
                               $users = DB::select('select * from booking_details where booking_id = ? ', [$cst]);
                            //    dd($users);
                               if ($users) {


                                   //$atg = array();
                                   foreach ($users as $or123) {
                                       array_push($atg, $or123);
                                   }


                                   //array_push($atg,$or123);
                                   //array_push($atg,$users);
                               } else {
                                   // echo "no";
                                   $users = null;
                               }

                               // $or1->memberdetails = $atg;


                           }

                           $data->passenger_details = $atg;
                       }
                   }
                   return response()->json(['code' => 200, 'status' => "success", 'message' => "Data fetched successfully!", 'data' => $getData]);
               }

           }
           
           else
           {
               return response()->json(['code' => 401, 'status' => "failed", 'message' => "incomplete parameters customer_id is required!"]);
           }
        }
        
        
           // start from 1/5/2023

        public function cancelBookings(Request $request)
        {
            if(isset($request['passenger_cnic']) && !empty(isset($request['passenger_cnic'])))
            {
                $cnic = $request['passenger_cnic'];
                $getPassenger = DB::table('booking_details')
                                ->where('passenger_cnic',$cnic)
                                ->update([
                                'booking_status'=>"Cancelled",
                                ]);
                $refundFare = DB::table('booking_details')
                                ->where('passenger_cnic',$cnic)
                                ->first();
                $getFare =$refundFare->seat_fare;
                $getCustomerId = $refundFare->customer_id;
                // dd($getCustomerId);
                // dd($getFare);



                        $getMyBalance = DB::table('payment_wallets')
                                    ->where('customer_id',$getCustomerId)
                                    ->first();
                                    // dd($getMyBalance);
                                    // $myBalance=$getMyBalance->my_balance;
                                    $totalBalance = $getMyBalance->total_balance;
                                // dd($totalBalance);
                        $refundFare = DB::table('payment_wallets')
                                ->where('customer_id',$getCustomerId)
                                ->update([
                                'refund_balance' =>$getFare,
                                'total_balance' =>$getFare+$totalBalance,
                                ]);


                        $addRefundDetails = new RefundDetails();
                                $addRefundDetails->customer_id = $getCustomerId;
                                $addRefundDetails->refund_balance = $getFare;
                                $addRefundDetails->refund_date = $request->refund_date;

                                $addRefundDetails->save();
                                // dd($addRefundDetails);
                                return response()->json(['code' => 200, 'status' => "success", 'message' => "Seat cancelled successfully!"]);
            }
            else
            {
                return response()->json(['code' => 401, 'status' => "failed", 'message' => "Incomplete parameter , passenger_cnic is required!"]);
            }
        }
}
