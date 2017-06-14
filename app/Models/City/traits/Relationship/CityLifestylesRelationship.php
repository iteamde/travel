<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\Lifestyle\Lifestyle;

/**
 * Class CityLifestylesRelationship.
 */
trait CityLifestylesRelationship
{
    /**
     * @return mixed
     */
    public function lifestyle()
    {
        return $this->hasOne(Lifestyle::class , 'id' , 'lifestyles_id');
    }
}
