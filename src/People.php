<?php

namespace App;

class People
{
    const SORT_ORDER_ASCENDING = 'ASC';
    const SORT_ORDER_DESCENDING = 'DESC';

    public function __construct($peoplePath)
    {
        $this->people = json_decode(file_get_contents($peoplePath));
    }

    public function sortBy($field, $sortOrder)
    {
        usort($this->people, function ($a, $b) use ($field, $sortOrder) {
            $this->checkForMissingFields($a, $b, $field);

            $ascending = $sortOrder === self::SORT_ORDER_ASCENDING;

            return $ascending ? $a->$field <=> $b->$field : $b->$field <=> $a->$field;
        });

        return $this->people;
    }

    private function checkForMissingFields($a, $b, $field)
    {
        if (!isset($a->$field, $b->$field)) {
            throw new MissingFieldException("The requested field $field is missing.");
        }
    }
}
