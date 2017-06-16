<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\Currencies\Currencies;

/**
 * Class UserRelationship.
 */
trait CountriesCurrenciesRelationship
{
    public function currency()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(Currencies::class , 'id' , 'currencies_id');
    }

}
