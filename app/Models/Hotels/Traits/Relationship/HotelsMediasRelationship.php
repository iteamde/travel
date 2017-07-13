<?php

namespace App\Models\Hotels\Traits\Relationship;

use App\Models\ActivityMedia\Media;

/**
 * Class HotelsMediasRelationship.
 */
trait HotelsMediasRelationship
{
    /**
     * @return mixed
     */
    public function media()
    {
        return $this->hasOne(Media::class , 'id' , 'medias_id');
    }   
}
