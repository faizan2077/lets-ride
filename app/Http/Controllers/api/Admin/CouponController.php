<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CouponService;
use App\Http\Requests\API\Admin\Busses\StoreCouponRequest;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller {

    protected $CouponService;

    public function __construct(CouponService $CouponService) {
        $this->CouponService = $CouponService;
    }

    public function addCoupon(StoreCouponRequest $request) {
        return $this->CouponService->addCoupon($request->all());
    }

    // public function applyCoupon(StoreCouponRequest $request) {
    //     return $this->CouponService->applyCoupon($request->all());
    // }

    public function applyCoupon(Request $request)
    {

        if(isset($request['coupon_number']) && !empty($request['coupon_number']))

    	{

		   $coupon_number = $request['coupon_number'];

    	    $users_p = DB::select('select * from coupons where coupon_number= ?', [$coupon_number]);
            if($users_p)
    		{
    		    return response()->json(['status'=>'success','data'=>$users_p]);
    		}
    		else
    		{
    		    return response()->json(['status'=>'failed','error'=>'No Coupons Exists.']);
    		}
    	}
    	else
    	{
    	    return response()->json(['status'=>'failed','error'=>'Incomplete Parameters']);
    	}
}

}
