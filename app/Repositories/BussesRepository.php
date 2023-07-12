<?php

namespace App\Repositories;

use App\Models\Busses;

class BussesRepository extends BaseRepository {

    /**
     * @param Degrees $model
     */
    public function __construct(Busses $model) {
        $this->model = $model;
    }

}
