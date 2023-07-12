<?php

namespace App\Repositories;

use App\Models\Drivers;

class DriversRepository extends BaseRepository {

    /**
     * @param Drivers $model
     */
    public function __construct(Drivers $model) {
        $this->model = $model;
    }

}
