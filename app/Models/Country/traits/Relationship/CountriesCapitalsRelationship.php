<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\City\Cities;

/**
 * Class UserRelationship.
 */
trait CountriesCapitalsRelationship
{
    public function city()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(Cities::class , 'id' , 'cities_id');
    }

}
