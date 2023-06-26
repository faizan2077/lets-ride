<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BookingDetailService;
use App\Http\Requests\API\Admin\Busses\BookingDetailsRequest;


class BookingDetailsController extends Controller {

    protected $BookingDetailService;

    public function __construct(BookingDetailService $BookingDetailService) {
        $this->BookingDetailService = $BookingDetailService;
    }

    public function bookingDetails(BookingDetailsRequest $request) {
        return $this->BookingDetailService->BookingDetails($request->all());
    }


}
