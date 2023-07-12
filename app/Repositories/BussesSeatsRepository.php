<?php

namespace App\Repositories;

use App\Models\Seats;

class BussesSeatsRepository extends BaseRepository {

    /**
     * @param Degrees $model
     */
    public function __construct(Seats $model) {
        $this->model = $model;
    }

}
