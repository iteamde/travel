<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\Holidays\Holidays;

/**
 * Class CityHolidaysRelationship.
 */
trait CityHolidaysRelationship
{
    /**
     * @return mixed
     */
    public function holiday()
    {
        return $this->hasOne(Holidays::class , 'id' , 'holidays_id');
    }
}
