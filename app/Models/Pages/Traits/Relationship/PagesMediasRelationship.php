<?php

namespace App\Models\Pages\Traits\Relationship;

use App\Models\ActivityMedia\Media;

/**
 * Class PagesMediasRelationship.
 */
trait PagesMediasRelationship
{
    public function media()
    {
        return $this->hasOne(Media::class , 'id' , 'medias_ids');
    }
}
