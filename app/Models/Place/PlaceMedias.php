<?php

namespace App\Models\Place;

use Illuminate\Database\Eloquent\Model;
use App\Models\Place\Traits\Relationship\PlaceMediasRelationship;
// use App\Models\Place\Traits\Attribute\PlaceAttribute;

class PlaceMedias extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'places_medias';
    
    use PlaceMediasRelationship;
        // PlaceMediasAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'places_id' , 'medias_id' ];
}
