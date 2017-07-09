<?php

namespace App\Models\City\Traits\Relationship;

use App\Models\ActivityMedia\Media;

/**
 * Class CityMediasRelationship.
 */
trait CityMediasRelationship
{
    /**
     * @return mixed
     */
    public function medias()
    {
        return $this->hasOne(Media::class , 'id' , 'medias_id');
    }
}
