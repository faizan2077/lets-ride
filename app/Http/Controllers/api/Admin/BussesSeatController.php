<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SeatsService;
use App\Http\Requests\API\Admin\Busses\SeatBussRequest;
use App\Models\Seats;

class BussesSeatController extends Controller {

    protected $SeatsService;

    public function __construct(SeatsService $SeatsService) {
        $this->SeatsService = $SeatsService;
    }

    public function seats(SeatBussRequest $request) {
        return $this->SeatsService->seats($request->all());
    }

    public function showSeats($buss_id)
    {

        $seats = Seats::where('buss_id',$buss_id)->get();

        return response()->json([
            'data' => $seats
        ]);
    }


}
