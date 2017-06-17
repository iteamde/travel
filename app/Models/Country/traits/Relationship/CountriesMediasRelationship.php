<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\ActivityMedia\Media;

/**
 * Class CountriesMediasRelationship.
 */
trait CountriesMediasRelationship
{
    public function media()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(Media::class , 'id' , 'medias_id');
    }

}
