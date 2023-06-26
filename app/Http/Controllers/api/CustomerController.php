<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\MobileApp\Auth\Customer\CustomerRegisterRequest;
use App\Models\Customers;
use App\Http\Requests\API\MobileApp\Auth\Customer\CustomerRegisterVerificationRequest;
use App\Http\Requests\API\MobileApp\Auth\Customer\CustomerLoginRequest;
use App\Http\Requests\API\MobileApp\Auth\Customer\CustomerUpdateProfileRequest;
use App\Http\Requests\API\MobileApp\Auth\Customer\CustomerForgetPasswordRequest;
use App\Http\Requests\API\MobileApp\Auth\Customer\CustomerResetPasswordVerificationRequest;
use App\Http\Requests\API\MobileApp\Auth\Customer\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\CustomerFaq;
use App\Models\Safety;
use App\Services\CustomerService;

class CustomerController extends Controller {

    protected $customerService;

    public function __construct(CustomerService $customerService) {
        $this->customerService = $customerService;
    }

    public function register(CustomerRegisterRequest $request) {
        return $this->customerService->store($request->all());
    }

    public function verifySignup(CustomerRegisterVerificationRequest $request) {
        return $this->customerService->verifySignup($request->all());
    }

    public function login(CustomerLoginRequest $request) {
        return $this->customerService->login($request->all());
    }

    public function updateProfile(CustomerUpdateProfileRequest $request) {
        return $this->customerService->updateProfile($request);
    }

    public function logout(Request $request) {
        return $this->customerService->logout($request->all());
    }

    public function forgetPassword(CustomerForgetPasswordRequest $request) {
        return $this->customerService->forgetPassword($request->all());
    }

    public function resetPassword(CustomerResetPasswordVerificationRequest $request) {
        return $this->customerService->resetPassword($request->all());
    }
    
    public function getFaq()
    {
        $getFaq = CustomerFaq::get();

        return response()->json(['code'=>200,'status'=>"success",'message'=>"Customer frequently asked question fetched successfully!",'data'=>$getFaq]);
    }

    public function getSafety()
    {
        $getSafety = Safety::get();

        return response()->json(['code'=>200,'status'=>"success",'message'=>"Customer Safet instruction fetched successfully!",'data'=>$getSafety]);
    }

    public function contactUs(ContactUsRequest $request)
    {
        $contactUs = new ContactUs();

        $contactUs->name = $request->name;
        $contactUs->email_id = $request->email_id;
        $contactUs->message = $request->message;

        $contactUs->save();

        return response()->json(['code'=>200,'status'=>"success",'message'=>"Your message submit successfully!"]);
    }


}
