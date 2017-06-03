<?php

namespace App\Models\PlaceTypes;

use Illuminate\Database\Eloquent\Model;
use App\Models\PlaceTypes\Traits\Relationship\PlaceTypesRelationship;
use App\Models\PlaceTypes\Traits\Attribute\PlaceTypesAttribute;

class PlaceTypes extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_place_types';
    
    use PlaceTypesRelationship,
        PlaceTypesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'lat', 'lng', 'safety_degree', 'active'];
}
