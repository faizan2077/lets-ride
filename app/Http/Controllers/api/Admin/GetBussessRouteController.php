<?php

namespace App\Http\Controllers\api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Busses;
use App\Models\BussesRouteDetails;
use App\Models\Routes;
use Illuminate\Http\Request;

class GetBussessRouteController extends Controller
{
    public function getBussesRoute()
    {
        $busses = Busses::get();
        $bussesRoute = BussesRouteDetails::get();
        $routes = Routes::get();

        return response()->json([
            'message' => "data get successfully!",
            'data' => ['busses routes' => $bussesRoute,
            'routes'=> $routes,
            'Busses' =>$busses,
            ],
        ],200);
    }
}
