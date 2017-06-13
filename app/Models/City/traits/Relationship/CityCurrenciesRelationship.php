<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\Currencies\Currencies;

/**
 * Class CityCurrenciesRelationship.
 */
trait CityCurrenciesRelationship
{
    /**
     * @return mixed
     */
    public function currency()
    {
        return $this->hasOne(Currencies::class , 'id' , 'currencies_id');
    }
}
