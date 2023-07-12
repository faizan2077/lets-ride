<?php

namespace App\Repositories;

// use App\Models\BussesTravelHistoryRepository;

use App\Models\BussesTravelHistory;
class BussesTravelHistoryRepository extends BaseRepository {

    /**
     * @param BussesTravelHistoryRepository $model
     */
    public function __construct(BussesTravelHistory $model) {
        $this->model = $model;
    }

}
