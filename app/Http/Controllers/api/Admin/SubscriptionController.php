<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MobileApp\Auth\Subscription\AddUserCreditRequest;
use App\Http\Requests\API\MobileApp\Auth\Subscription\AddUserRidesRequest;
use App\Http\Requests\API\MobileApp\Auth\Subscription\AddUserSubscriptionRequest;
use App\Models\Credit;
use App\Models\Customers;
use App\Models\Package;
use App\Models\userRide;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller {

public function addPackages(Request $request)
{
    $addPackage = new Package();

    $addPackage->plan_name = $request->plan_name;
    $addPackage->price = $request->price;
    $addPackage->available_rides = $request->available_rides;
    if (empty($addPackage->plan_name) && empty($addPackage->available_rides)) {
        return response()->json(['code'=>400,'statu'=>"failed",'message' => 'Please select a package'], 400);
    }

    $addPackage->save();

    return response()->json(['code'=>200,'status'=>"success",'message'=>"Packages added successfully!"]);
}

public function getPackages()
{
    $response =array();

    $getBasic = Package::where('plan_name', 'basic')->first();
    $getPlus = Package::where('plan_name', 'plus')->first();
    $getGold = Package::where('plan_name', 'gold')->first();

    $response =[
    'basic_plan'=>$getBasic,
    'plus_plan'=>$getPlus,
    'gold_plan'=>$getGold,
    ];

    return response()->json(['code'=>200,'status'=>"success","message"=>"Package plans fetched successfully!",'data'=>$response]);

}

public function deletePackages(Request $request)
{
    if(isset($request['id']) && !empty($request['id']))
    {
        $id = $request['id'];

        $deletePlan = DB::table('packages')
                    ->where('id',$id)
                    ->get();
        if($deletePlan->isNotEmpty())
        {
            $deletePlan = DB::table('packages')
            ->where('id',$id)
            ->delete();

            return response()->json(['code'=>200,'status'=>"success","message"=>"Package plan deleted successfully!"]);
        }

        else
        {
            return response()->json(['code'=>400,'statu'=>"failed",'message' => 'Id not found!'], 400);
        }
    }
    else
    {
        return response()->json(['code'=>400,'statu'=>"failed",'message' => 'Incomplete parameters id is required!'], 400);
    }
}

public function userSubscriptionPackage(AddUserSubscriptionRequest $request)
{
    $addSubscription = new UserSubscription();

    $addSubscription->package_id = $request->package_id;
    $addSubscription->subs_date = $request->subs_date;
    $addSubscription->user_id = $request->user_id;
    $addSubscription->ride_no = $request->ride_no;
    $addSubscription->status = "subscribed";

    $addSubscription->save();

    return response()->json(['code'=>200,'status'=>"success","message"=>"Subscription added successfully!"]);

}

public function getUserSubscriptions(Request $request)
{
    if(isset($request['user_id']) && !empty($request['user_id']))
    {
        $id = $request['user_id'];

        $getUserSubscription = DB::table('user_subscriptions')
                    ->where('user_id',$id)
                    ->get();
        if($getUserSubscription->isNotEmpty())
        {
            $getUserSubscription = DB::table('user_subscriptions')
            ->where('user_id',$id)
            ->get();

            return response()->json(['code'=>200,'status'=>"success","message"=>"User subscriptions fetched successfully!",'data'=>$getUserSubscription]);
        }

        else
        {
            return response()->json(['code'=>400,'statu'=>"failed",'message' => 'User id not found!'], 400);
        }
    }
    else
    {
        return response()->json(['code'=>400,'statu'=>"failed",'message' => 'Incomplete parameters id is required!'], 400);
    }
}

public function addCredit(AddUserCreditRequest $request)
{
    $addCredit = new Credit();

    $addCredit->user_id = $request->user_id;
    $addCredit->amount = $request->amount;
    $addCredit->type = $request->type;
    $addCredit->date = $request->date;

    $addCredit->save();

    if($addCredit)
    {
        $getBalance = DB::table('customers')
                    ->where('id',$request->user_id)
                    ->first();
        $userBalance = $getBalance->user_balance;

        $updateBalance = DB::table('customers')
                    ->where('id',$request->user_id)
                    ->update([
                        'user_balance'=>$userBalance + $request->amount,
                    ]);
        return response()->json(['code'=>200,'status'=>"success",'message'=>"Credit added successfully!"]);
    }
}

public function getCredit(Request $request)
{
    if(isset($request['user_id']) && !empty($request['user_id']))
    {
        $id = $request['user_id'];

        $getBalance=DB::table('customers')
                    ->where('id',$id)
                    ->first();
        if($getBalance)
            {
                return response()->json(['code'=>200,'status'=>"success",'message'=>"Customer balance fetched successfully!",'data'=>$getBalance]);

            }

            else
            {
                return response()->json(['code'=>400,'statu'=>"failed",'message' => 'user_id not found!'], 400);
            }
    }

    else
    {
        return response()->json(['code'=>400,'statu'=>"failed",'message' => 'Incomplete parameters user_id is required!'], 400);
    }
}

public function addUserRide(AddUserRidesRequest $request)
{
    $addUserRide = new userRide();

    $addUserRide->user_id = $request->user_id;
    $addUserRide->package_id = $request->package_id;
    $addUserRide->ride_no = $request->ride_no;
    $addUserRide->date = $request->date;
    $addUserRide->ride_fare = $request->ride_fare;
    $addUserRide->route_id = $request->route_id;

    $addUserRide->save();

    if($addUserRide){

        $getUserRide = DB::table('user_subscriptions')
                   ->where('user_id',$request->user_id)
                   ->first();
        $ride_no = $getUserRide->ride_no;

        $updateUserRide =  DB::table('user_subscriptions')
        ->where('user_id',$request->user_id)
        ->update([
            'ride_no' => $ride_no - $request->ride_no,
        ]);

    return response()->json(['code'=>200,'status'=>"success",'message'=>"User ride add successfully!"]);
    }
}

public function viewUserRide(Request $request)
{
    {
        if(isset($request['user_id']) && !empty($request['user_id']))
        {
            $id = $request['user_id'];

            $getBalance=DB::table('user_rides')
                        ->where('user_id',$id)
                        ->first();
            if($getBalance)
                {
                    return response()->json(['code'=>200,'status'=>"success",'message'=>"User rides fetched successfully!",'data'=>$getBalance]);

                }

                else
                {
                    return response()->json(['code'=>400,'statu'=>"failed",'message' => 'user_id not found!'], 400);
                }
        }

        else
        {
            return response()->json(['code'=>400,'statu'=>"failed",'message' => 'Incomplete parameters user_id is required!'], 400);
        }
    }
}

}
