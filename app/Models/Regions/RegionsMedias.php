<?php

namespace App\Models\Regions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Regions\Traits\Relationship\RegionsMediasRelationship;
// use App\Models\Place\Traits\Attribute\PlaceAttribute;

class RegionsMedias extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_regions_medias';
    
    use RegionsMediasRelationship;
        // PlaceMediasAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'regions_id' , 'medias_id' ];
}
