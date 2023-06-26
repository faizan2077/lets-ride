<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Busses;
use Validator;
class BusesController extends Controller
{
    public function busesManagement()
    {
        $buses = Busses::get();
        return view('admin.buses_management',compact('buses'));
    }

    public function AddbusesManagement()
    {
        return view('admin.add_buses_management');
    }

    public function AddBusesDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'starting_point' => 'required',
            'registration_no' => 'required',
            'ending_point' => 'required',
            'route_completeion_time' => 'required',
            'stops_route_of_the_bus' => 'required',
            'current_driver_id' => 'required',

        ]);
            if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $buses = new Busses();

        $buses->starting_point = $request->starting_point;
        $buses->registration_no = $request->registration_no;
        $buses->ending_point = $request->ending_point;
        $buses->route_completeion_time = $request->route_completeion_time;
        $buses->stops_route_of_the_bus = $request->stops_route_of_the_bus;
        $buses->current_driver_id = $request->current_driver_id;

        $buses->save();

        return back()->with('message','data inserted');
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
        $buss = Busses::find($id)->delete();
        return back()->with('message','Buss deleted sucessfully!');
    }

}
