<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\Holidays\Holidays;

/**
 * Class UserRelationship.
 */
trait CountriesHolidaysRelationship
{
    public function holiday()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(Holidays::class , 'id' , 'holidays_id');
    }

}
