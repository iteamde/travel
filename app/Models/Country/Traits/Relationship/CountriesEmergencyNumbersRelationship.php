<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\EmergencyNumbers\EmergencyNumbers;

/**
 * Class CountriesEmergencyNumbersRelationship.
 */
trait CountriesEmergencyNumbersRelationship
{
    public function emergency_number()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(EmergencyNumbers::class , 'id' , 'emergency_numbers_id');
    }

}
