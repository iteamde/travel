<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\Place\Place;

/**
 * Class CityAirportRelationship.
 */
trait CityAirportRelationship
{
    /**
     * @return mixed
     */
    public function place()
    {
        return $this->hasOne(Place::class , 'id' , 'places_id');
    }
}
