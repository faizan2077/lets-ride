<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BussesService;
use App\Http\Requests\API\Admin\Busses\StoreBussRequest;
class BussesController extends Controller {

    protected $bussService;

    public function __construct(BussesService $bussService) {
        $this->bussService = $bussService;
    }

    public function store(StoreBussRequest $request) {
        return $this->bussService->store($request->all());
    }


}
