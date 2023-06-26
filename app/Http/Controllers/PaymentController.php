<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\API\Admin\PaymentWallet\AddPaymentWalletRequest;
use App\Models\PaymentWallet;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function AddWalletPayment(AddPaymentWalletRequest $request)
    {
        $customer_id =$request['customer_id'];

        $getCustomer = DB::table('payment_wallets')
                        ->where('customer_id',$customer_id)
                        ->get();
        // dd($getCustomer);
        if($getCustomer->isEmpty())
        {

        $addWallet = new PaymentWallet();

        $addWallet->customer_id = $request->customer_id;
        $addWallet->my_balance = $request->my_balance;
        $addWallet->total_balance = $addWallet->my_balance;

        $addWallet->save();

        return response()->json(['code' => 200, 'status' => "success", 'message' => "Add wallet payment successfully!"]);
        }
        else
        {
            $getMyBalance = DB::table('payment_wallets')
                            ->where('customer_id',$customer_id)
                            ->first();
            $getBalance = $getMyBalance->my_balance;
            $totalBalance = $getMyBalance->total_balance;
            $updateBalance = DB::table('payment_wallets')
                            ->where('customer_id',$customer_id)
                            ->update([
                                'my_balance' => $request['my_balance'] + $getBalance,
                                'total_balance' => $request['my_balance'] + $totalBalance,
                            ]);
                            return response()->json(['code' => 200, 'status' => "success", 'message' => "Add wallet payment successfully!"]);
        }

    }


    public function reedemWalletPayment(Request $request)
    {
        if(isset($request['customer_id']) && !empty(isset($request['customer_id'])))
        {
            $customer_id = $request['customer_id'];
            $ticket_price = 20;
            $redeemWallet = DB::table('payment_wallets')
                            ->where('customer_id',$customer_id)
                            ->first();
                            $total_balance = $redeemWallet->total_balance;
                            // dd($total_balance);
                if($redeemWallet)
                {
                    $purchace_ticket  = $total_balance - $ticket_price;

                    if($purchace_ticket)
                        {

                            $updateTotalBalance = DB::table('payment_wallets')
                                                ->where('customer_id',$customer_id)
                                                ->update([
                                                    'total_balance'=>$purchace_ticket,
                                                ]);
                                                // dd($purchace_ticket);
                             return response()->json(['code'=>200,'status'=>"success","message"=> "ticket buy successfully!"]);
                        }

                        else
                        {
                            return response()->json(['code'=>401,'status'=>"failed",'message'=>"tickent not purchase something went wrong!"]);
                        }


                }

                else
                {
                    return response()->json(['code'=>401,'status'=>"failed",'message'=>"Customer_id not exist!"]);
                }


        }
        else
        {
            return response()->json(['code'=>401,'status'=>"failed",'message'=>"incomplete parameters!"]);
        }
    }
}
