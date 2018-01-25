<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\LanguagesSpoken\LanguagesSpoken;

/**
 * Class CityAdditionalLanguagesSpokenRelationship.
 */
trait CityAdditionalLanguagesSpokenRelationship
{
    /**
     * @return mixed
     */
    public function languages_spoken()
    {
        return $this->hasOne(LanguagesSpoken::class , 'id' , 'languages_spoken_id');
    }
}
