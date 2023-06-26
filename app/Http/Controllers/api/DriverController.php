<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\MobileApp\Auth\Driver\DriverRegisterRequest;
use App\Models\Drivers;
use App\Http\Requests\API\MobileApp\Auth\Driver\DriverRegisterVerificationRequest;
use App\Http\Requests\API\MobileApp\Auth\Driver\DriverLoginRequest;
use App\Http\Requests\API\MobileApp\Auth\Driver\DriverUpdateProfileRequest;
use App\Http\Requests\API\MobileApp\Auth\Driver\DriverForgetPasswordRequest;
use App\Http\Requests\API\MobileApp\Auth\Driver\DriverResetPasswordVerificationRequest;
use App\Http\Requests\API\MobileApp\Auth\Driver\DriverVerifyIdentityRequest;
use App\Services\DriverService;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DriverController extends Controller {

    protected $DriverService;

    public function __construct(DriverService $DriverService) {
        $this->DriverService = $DriverService;
    }

    public function register(DriverRegisterRequest $request) {
        return $this->DriverService->store($request->all());
    }

    public function verifySignup(DriverRegisterVerificationRequest $request) {
        return $this->DriverService->verifySignup($request->all());
    }

    public function login(DriverLoginRequest $request) {
        return $this->DriverService->login($request->all());
    }

    public function updateProfile(DriverUpdateProfileRequest $request) {
        return $this->DriverService->updateProfile($request);
    }

    public function logout(Request $request) {
        return $this->DriverService->logout($request->all());
    }

    public function forgetPassword(DriverForgetPasswordRequest $request) {
        return $this->DriverService->forgetPassword($request->all());
    }

    public function resetPassword(DriverResetPasswordVerificationRequest $request) {
        return $this->DriverService->resetPassword($request->all());
    }

    public function identityVerify(DriverVerifyIdentityRequest $request)

    {

        // for driver image
        $selfie = $request->selfie;
        $imageName =  'selfie' . '/' . time() . '.' . $selfie->Extension();
        $request->selfie->storeAs('public/', $imageName);

        // for license image
        $license_image = $request->license_image;
        $licenseImageName = 'license_image' . '/' . time() . '.' . $license_image->Extension();
        $request->license_image->storeAs('public/', $licenseImageName);

        //for cnic front
        $cnic_front = $request->cnic_front;
        $frontImageName ='cnic_front' . '/' . time() . '.' . $cnic_front->Extension();
        $request->cnic_front->storeAs('public/', $frontImageName);

         //for cnic back
         $cnic_back = $request->cnic_back;
         $backImageName ='cnic_back' . '/' . time() . '.' . $cnic_back->Extension();
         $request->cnic_back->storeAs('public/', $backImageName);


    if(isset($request['id']) && !empty($request['id']))

    {

       $id = $request['id'];

        $driver = DB::select('select * from drivers where id= ?', [$id]);
        if($driver)
        {
            $driver = Drivers::find($id);

            $driver->verify_identity_st = $request->verify_identity_st;
            $driver->selfie = $imageName;
            $driver->license_image = $licenseImageName;
            $driver->cnic_front = $frontImageName;
            $driver->cnic_back = $backImageName;

            $driver->save();
            return response()->json(['status'=>'success','Success'=>'Data upload successfully!.']);
        }
        else
        {
            return response()->json(['status'=>'failed','error'=>'No driver id Exists.']);
        }
    }
    else
    {
        return response()->json(['status'=>'failed','error'=>'Incomplete Parameters']);
    }

    }

    public function viewVerifyIdentity(Request $request)
    {

        if(isset($request['id']) && !empty($request['id']))

        {

           $id = $request['id'];

            $driver = DB::select('select selfie,license_image,cnic_front,cnic_back,verify_identity_st,rejected_message from drivers where id= ?', [$id]);
            if($driver)
            {

                    return response()->json(['status'=>'success','success'=>'Driver Record fetched successfully!.','data'=>$driver]);
            }
            else
            {
                return response()->json(['status'=>'failed','error'=>'No driver id Exists.']);
            }
        }
        else
        {
            return response()->json(['status'=>'failed','error'=>'Incomplete Parameters']);
        }

    }



    public function getLinkDriverToBuss(Request $request) {

            $driverIds = DB::table("busses_route_details")
                    ->where("driver_id", $request["driver_id"])
                    ->pluck("driver_id");

            $drivers = DB::table("drivers")
                            ->whereIn("id", $driverIds)->get();

            $response = [];

            foreach ($drivers as $driver) {
                $routeShow = DB::table("busses_route_details as brd")
                        ->selectRaw("r.*")
                        ->join("routes as r", "r.id", "brd.route_id")
                        // ->where("brd.route_id", $driver->id)
                        ->get();
                $buss = DB::table("busses_route_details as brd")
                        ->selectRaw("b.*")
                        ->join("busses as b", "b.id", "brd.buss_id")
                        // ->where("brd.route_id", $driver->id)
                        ->get();
                $response[] = array(
                    "driver_id" => $driver->id,
                    "driver_name" => $driver->name,
                    "verify_identity_st" => $driver->verify_identity_st,
                    "driver_st" => $driver->driver_st,
                    // "route_code" => $route->code,
                    "buss_details" => $buss->toArray(),
                    "route_buss_stops" => $routeShow->toArray()

                );
            }

            return response()->json([
                        'code' => 200,
                        'status' => 'Success',
                        'message' => 'Driver fetched successfully.',
                        'data' => $response], 200);
        }
        
        
        // Maintenance mode api's for izesan
        
        
         public function getMaintenanceMode() {
        //1 = enable, 0 = disabled 
        $isMaintenanceModeEnabled = 2;
        $db_update = 1;
        $base_url = "http://18.218.131.26/backend/";
        if($isMaintenanceModeEnabled == 0)
        {
            return response()->json([
                    "status" => "Success",
                    "code" => 200,
                    "message" =>"The App is on maintenance mode." ,
                    "data" => [
                        "maintenance_mode" => $isMaintenanceModeEnabled, "db_update" => $db_update
                    ]
        ]);
        
        }
        
        elseIf($isMaintenanceModeEnabled == 1 )
        
        {
              return response()->json([
                    "status" => "Success",
                    "code" => 200,
                    "message" =>"The App is no more on maintenance mode." ,
                    "data" => [
                        "maintenance_mode" => $isMaintenanceModeEnabled,
                        "db_update" => $db_update,
                    ]
        ]);
        }
        
        else
        {
           return response()->json([
                    "status" => "Success",
                    "code" => 200,
                    "message" =>"The App is no more on maintenance mode." ,
                    "data" => [
                        "maintenance_mode" => $isMaintenanceModeEnabled,
                        "db_update" => $db_update,
                        "base_url" => $base_url,
                    ]
        ]); 
        }
        
        // //1 / 0
        // //1 = db updated 0 = db not  updated
        // $db_update = 0; //1 / 0 
        // return response()->json([
        //             "status" => "Success",
        //             "code" => 200,
        //             "message" => ($isMaintenanceModeEnabled && $isMaintenanceModeEnabled === 1) ? "The App is on maintenance mode." : "The App is no more on maintenance mode.",
        //             "data" => [
        //                 "maintenance_mode" => $isMaintenanceModeEnabled, "db_update" => $db_update
        //             ]
        // ]);
    }

    public function getMaintenanceModeForIOS() {
        //1 = enable, 0 = disabled 
        $isMaintenanceModeEnabled = 0; //1 / 0 
        return response()->json([
                    "status" => "Success",
                    "code" => 200,
                    "message" => ($isMaintenanceModeEnabled && $isMaintenanceModeEnabled === 1) ? "The App is on maintenance mode." : "The App is no more on maintenance mode.",
                    "data" => [
                        "maintenance_mode" => $isMaintenanceModeEnabled
                    ]
        ]);
    }


}
