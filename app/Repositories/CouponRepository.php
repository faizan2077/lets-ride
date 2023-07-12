<?php

namespace App\Repositories;

use App\Models\Coupon;

class CouponRepository extends BaseRepository {

    /**
     * @param Degrees $model
     */
    public function __construct(Coupon $model) {
        $this->model = $model;
    }

}
