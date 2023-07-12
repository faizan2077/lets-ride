<?php

namespace App\Repositories;

use App\Models\BookingDetails;

class BookingDetailsRepository extends BaseRepository {

    /**
     * @param BookingDetails $model
     */
    public function __construct(BookingDetails $model) {
        $this->model = $model;
    }

}
