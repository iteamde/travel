<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\Religion\Religion;

/**
 * Class CityReligionsRelationship.
 */
trait CityReligionsRelationship
{
    /**
     * @return mixed
     */
    public function religion()
    {
        return $this->hasOne(Religion::class , 'id' , 'religions_id');
    }
}
