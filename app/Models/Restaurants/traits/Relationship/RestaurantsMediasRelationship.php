<?php

namespace App\Models\Restaurants\Traits\Relationship;

use App\Models\ActivityMedia\Media;

/**
 * Class RestaurantsMediasRelationship.
 */
trait RestaurantsMediasRelationship
{
    public function media(){
        return $this->hasOne(Media::class , 'id' , 'medias_id');
    }
}
