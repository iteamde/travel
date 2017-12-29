<?php

namespace App\Models\Embassies\Traits\Relationship;

use App\Models\ActivityMedia\Media;

/**
 * Class PlaceRelationship.
 */
trait EmbassiesMediaRelationship
{
    /**
     * Many-to-Many relations with Medias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function media()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne( Media::class , 'id' , 'medias_id');
    }
}
