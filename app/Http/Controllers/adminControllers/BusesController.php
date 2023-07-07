<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Busses;
use App\Models\BussesRouteDetails;
use App\Models\Drivers;
use App\Models\Routes;
use Validator;

class BusesController extends Controller
{
    public function busesManagement()
    {
        $buses = Busses::get();
        $allRoutes = Routes::get();

        foreach ($buses as $index => $bus) {
            $busRouteName = Routes::find($bus->current_route_id);
            $driverName = Drivers::find($bus->current_driver_id);
            if ($busRouteName) {
                $bus->current_route_id = $busRouteName['title'];
            }else{
                $bus->current_route_id = null;

            }
            if ($driverName) {
                $bus->current_driver_id = $driverName['name'];
            }
        };

        // dd($buses);

        return view('admin.buses_management', compact('buses', 'allRoutes'));
    }

    public function  AssignDirectRoute(Request $request){
        dd($request);
    }

    public function AddbusesManagement()
    {
        return view('admin.add_buses_management');
    }

    public function AddBusesDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'registration_no' => 'required|max:9999|min:1|unique:busses',
            'total_seats' => 'required|min:10|numeric',
            'is_airconditioned',


        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $buses = new Busses();

        $buses->registration_no = $request->registration_no;
        $buses->total_seats = $request->total_seats;
        $buses->is_airconditioned = $request->input('is_airconditioned') ?? 0;

        $buses->save();

        return back()->with('message', 'Bus Added Successfully!');
        // {           if($buses->save())
        //         return response()->json([
        //             "code" => 200,
        //             "status" => "success",
        //             "message" => "Bus add successfully!",
        //             "data" => [], // return data i.e. user profile etc
        //         ]);
        // }
        // else
        // {
        //     return response()->json([
        //         "code" => 401,
        //         "status" => "error",
        //         "message" => "buses does not add"
        //     ]);
        // }

    }

    public function deleteBuss($id)
    {
        $bus = Busses::find($id);
        $busRoute = Routes::find($bus->current_route_id);
        $driver = Drivers::find($bus->current_driver_id);
        if ($driver) {
            $driver->available = 0;
        }
        if ($busRoute) {
            $busRoute->assigned = 0;
        }
        $bussRouteDetail = BussesRouteDetails::find('buss_id', $id );
        $bussRouteDetail->buss_id = null;
        $bussRouteDetail->save();
        // dd($driver, $busRoute);
        Busses::find($id)->delete();
        return back()->with('message', 'Bus deleted sucessfully!');
    }
}
