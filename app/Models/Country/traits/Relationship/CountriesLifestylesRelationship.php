<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\Lifestyle\Lifestyle;

/**
 * Class UserRelationship.
 */
trait CountriesLifestylesRelationship
{
    public function lifestyle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(Lifestyle::class , 'id' , 'lifestyles_id');
    }

}
