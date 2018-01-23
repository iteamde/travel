<?php

namespace App\Models\Lifestyle\Relationship;

use App\Models\ActivityMedia\Media;

/**
 * Class LifestyleMediasRelationship.
 */
trait LifestyleMediasRelationship
{
    public function media()
    {
        return $this->hasOne(Media::class , 'id' , 'medias_id');
    }

}
