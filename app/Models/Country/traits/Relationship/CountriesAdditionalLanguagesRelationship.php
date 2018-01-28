<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\LanguagesSpoken\LanguagesSpoken;

/**
 * Class CountriesAdditionalLanguagesRelationship.
 */
trait CountriesadditionallanguagesRelationship
{
    public function language_spoken()
    {
        return $this->hasOne(LanguagesSpoken::class , 'id' , 'languages_spoken_id');
    }

}
