<?php

namespace App\Repositories;

use App\Models\BussStops;

class BussStopsRepository extends BaseRepository {

    /**
     * @param BussStops $model
     */
    public function __construct(BussStops $model) {
        $this->model = $model;
    }

    public function getAll($filters = [], $paginated = true, $with = [], $select = "*") {
        $query = $this->model;
        $query = $query->select($select);
        $orderBy = "ASC";

        if (isset($filters['search']) && !empty($filters['search'])) {
            $query = $query->where(function ($query) use ($filters) {
                $query->orWhere('title', 'LIKE', \Arr::get($filters, 'search', '') . "%");
                $query->orWhere('short_title', 'LIKE', \Arr::get($filters, 'search', '') . "%");
            });
        }

        $query = $query->orderBy("title", $orderBy);
        if ($paginated)
            return $query->paginate(\Config::get("constants.PER_PAGE"));
        else
            return $query->get();
    }

}
