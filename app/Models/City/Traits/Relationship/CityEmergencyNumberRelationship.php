<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\EmergencyNumbers\EmergencyNumbers;

/**
 * Class CityEmergencyNumberRelationship.
 */
trait CityEmergencyNumberRelationship
{
    /**
     * @return mixed
     */
    public function emergency_number()
    {
        return $this->hasOne(EmergencyNumbers::class , 'id' , 'emergency_numbers_id');
    }
}
