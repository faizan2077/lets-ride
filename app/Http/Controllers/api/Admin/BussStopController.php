<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BussStopService;
use App\Http\Requests\API\Admin\BussStops\StoreBussStopRequest;
use App\Http\Requests\API\Admin\BussStops\FindBussStopRequest;

class BussStopController extends Controller {

    protected $bussStopService;

    public function __construct(BussStopService $bussStopService) {
        $this->bussStopService = $bussStopService;
    }

    public function store(StoreBussStopRequest $request) {
        return $this->bussStopService->store($request->all());
    }

    public function findBussStop(FindBussStopRequest $request) {
        return $this->bussStopService->findBussStop($request->all());
    }

}
