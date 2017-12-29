<?php

namespace App\Models\Embassies;
use Illuminate\Database\Eloquent\Model;
use App\Models\Embassies\Traits\Relationship\EmbassiesMediaRelationship;
// use App\Models\Place\Traits\Attribute\PlaceAttribute;

class EmbassiesMedias extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'embassies_media';
    
    use EmbassiesMediaRelationship;
        // PlaceMediasAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'embassies_id' , 'medias_id' ];
}
