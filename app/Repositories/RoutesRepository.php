<?php

namespace App\Repositories;

use App\Models\Routes;

class RoutesRepository extends BaseRepository {

    /**
     * @param Routes $model
     */
    public function __construct(Routes $model) {
        $this->model = $model;
    }

}
