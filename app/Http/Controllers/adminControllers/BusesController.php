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
        return view('admin.buses_management', compact('buses'));
    }

    public function AddbusesManagement()
    {
        return view('admin.add_buses_management');
    }

    public function AddBusesDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'registration_no' => 'required|max:9999|min:1|unique:busses|numeric',
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
        $buss = Busses::find($id)->delete();
        return back()->with('message', 'Bus deleted sucessfully!');
    }
}
