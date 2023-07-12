<?php

namespace App\Repositories;

use App\Models\Bookings;

class BookingsRepository extends BaseRepository {

    /**
     * @param Bookings $model
     */
    public function __construct(Bookings $model) {
        $this->model = $model;
    }

}
