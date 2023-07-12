<?php

namespace App\Services;

use App\Repositories\CustomersRepository;

class CustomerService {

    /**
     * @var CustomersRepository
     */
    protected $repository;

    public function __construct(CustomersRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function getAll(array $filters = []): mixed {
        return $this->repository->getAll($filters);
    }

    /**
     * @param array $filters
     * @return mixed
     */

    public function store(array $modelValues = []) {
        
        $modelValues["verification_code"] = $this->repository->getUniqueValue(6, 'verification_code');
        $modelValues['password'] = \Hash::make($modelValues['password']);
        \Arr::forget($modelValues, ["password_confirmation"]);

        $customer = $this->repository->store($modelValues);
        return response()->json([
                    'code' => 200,
                    'status' => 'Success',
                    'message' => 'Customer registered successfully.',
                    'data' => [
                        "verification_code" => $customer->verification_code
                    ]], 200);
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function updateProfile($request) {
        $input = $modelValues = $request->all();
        //Image Uploading
        if ($request->hasFile('image')) {
            $modelValues["image"] = $request->file('image')->storeAs('users', request()->file('image')->getClientOriginalName());
        }

        $customerID = $request["customer_id"];
        \Arr::forget($modelValues, ["customer_id", "customer"]);
        if ($this->repository->update($modelValues, $customerID)) {
            $customer = $this->repository->getOne($customerID);
            $customer = $customer->toArray();
            $customer["bearer_token"] = $customer["api_auth_token"] ?? NULL;
            return response()->json([
                        'code' => 200,
                        'status' => 'Success',
                        'message' => 'Profile updated successfully.',
                        'data' => [$customer]], 200);
        }

        return response()->json([
                    'code' => 421,
                    'status' => 'Error',
                    'message' => 'Profile unable to update. Something went wrong.'], 421);
    }

    public function verifySignup(array $modelValues = []) {
        $customer = $this->repository->getOne($modelValues["phone"], "phone");

        if ($customer && !$customer->verified_at && $customer->verification_code == $modelValues["verification_code"]) {
            $apiAuthToken = $this->repository->getUniqueValue(10, 'api_auth_token');
            $customer->verified_at = \Carbon\Carbon::now();
            $customer->status = TRUE;
            $customer->api_auth_token = $apiAuthToken;
            $customer->save();

            $customer = $customer->toArray();
            $customer["bearer_token"] = $customer["api_auth_token"] ?? NULL;
            return response()->json([
                        'code' => 200,
                        'status' => 'Success',
                        'message' => 'Customer verified successfully.',
                        'data' => [$customer]], 200);
        }

        return response()->json([
                    'code' => 421,
                    'status' => 'Error',
                    'message' => 'Phone number or verification code is invalid.'], 421);
    }

    public function login(array $modelValues = []) {
        if (\Auth::guard('api')->attempt(['phone' => request('phone'), 'password' => request('password')])) {
            $apiAuthToken = $this->repository->getUniqueValue(10, 'api_auth_token');
            $user = \Auth::guard('api')->user();
//            $token = $user->createToken('MyApp')->accessToken;
            $user->api_auth_token = $apiAuthToken;
            $user->save();
            $user = $user->toArray();
            $user["bearer_token"] = $user["api_auth_token"] ?? NULL;
            return response()->json([
                        'code' => 200,
                        'status' => 'Success',
                        'message' => 'Login successfully.',
                        'data' => [$user]], 200);
        }

        return response()->json([
                    'code' => 421,
                    'status' => 'Error',
                    'message' => 'Phone number or password is incorrect.'], 421);
    }

    public function logout(array $modelValues = []) {
        $update = array("api_auth_token" => NULL);
        if ($this->repository->update($update, $modelValues["customer_id"])) {
            return response()->json([
                        'code' => 200,
                        'status' => 'Success',
                        'message' => 'Logout successfully.'], 200);
        }

        return response()->json([
                    'code' => 421,
                    'status' => 'Error',
                    'message' => 'Something went wrong.'], 421);
    }

    public function forgetPassword(array $modelValues = []) {
        $customer = $this->repository->getOne($modelValues["phone"], "phone");

        if ($customer) {
            $customer->verified_at = NULL;
            $customer-> verification_code= NULL;
            if (empty($customer->verification_code)) {
                $customer->verification_code = $this->repository->getUniqueValue(6, 'verification_code');
            }

            $customer->save();

            return response()->json([
                        'code' => 200,
                        'status' => 'Success',
                        'message' => 'Verification code sent successfully.',
                        'data' => [
                            "verification_code" => $customer->verification_code
                        ]], 200);
        }

        return response()->json([
                    'code' => 421,
                    'status' => 'Error',
                    'message' => 'Unable to reset your password.'], 421);
    }

    public function resetPassword(array $modelValues = []) {
        $customer = $this->repository->getOne($modelValues["phone"], "phone");

        if ($customer && !$customer->verified_at && $customer->verification_code == $modelValues["verification_code"]) {
            $customer->verified_at = \Carbon\Carbon::now();
            $customer->status = TRUE;
            $customer->password = \Hash::make($modelValues['password']);
            $customer->save();

            return response()->json([
                        'code' => 200,
                        'status' => 'Success',
                        'message' => 'Password reset successfully.'], 200);
        }

        return response()->json([
                    'code' => 421,
                    'status' => 'Error',
                    'message' => 'Phone number or verification code is invalid.'], 421);
    }

}
