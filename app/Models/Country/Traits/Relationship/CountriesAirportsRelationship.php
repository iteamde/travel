<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\Place\Place;

/**
 * Class UserRelationship.
 */
trait CountriesAirportsRelationship
{
    public function place()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(Place::class , 'id' , 'places_id');
    }

}
