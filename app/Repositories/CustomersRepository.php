<?php

namespace App\Repositories;

use App\Models\Customers;

class CustomersRepository extends BaseRepository {

    /**
     * @param Customers $model
     */
    public function __construct(Customers $model) {
        $this->model = $model;
    }

}
