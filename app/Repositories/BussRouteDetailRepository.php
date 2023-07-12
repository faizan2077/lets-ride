<?php

namespace App\Repositories;

use App\Models\BussesRouteDetails;

class BussRouteDetailRepository extends BaseRepository {

    /**
     * @param BussStops $model
     */
    public function __construct(BussesRouteDetails $model) {
        $this->model = $model;
    }

}
