<?php

namespace App\Repositories;

use App\Models\RouteStops;

class RouteStopsRepository extends BaseRepository {

    /**
     * @param BussStops $model
     */
    public function __construct(RouteStops $model) {
        $this->model = $model;
    }

}
