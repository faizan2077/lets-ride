<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RouteService;
use App\Http\Requests\API\Admin\Routes\StoreRouteRequest;
use App\Http\Requests\API\Admin\Routes\StoreBussRouteDetailRequest;

class RouteController extends Controller {

    protected $routeService;

    public function __construct(RouteService $routeService) {
        $this->routeService = $routeService;
    }

    public function store(StoreRouteRequest $request) {
        return $this->routeService->store($request->all());
    }

    public function linkBussToRoute(StoreBussRouteDetailRequest $request) {
        return $this->routeService->linkBussToRoute($request->all());
    }

}
