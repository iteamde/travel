<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\LanguagesSpoken\LanguagesSpoken;

/**
 * Class UserRelationship.
 */
trait CountriesLanguagesSpokenRelationship
{
    public function language_spoken()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(LanguagesSpoken::class , 'id' , 'languages_spoken_id');
    }

}
