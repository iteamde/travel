<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\Religion\Religion;

/**
 * Class CountriesReligionsRelationship.
 */
trait CountriesReligionsRelationship
{
    public function religion()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(Religion::class , 'id' , 'religions_id');
    }

}
