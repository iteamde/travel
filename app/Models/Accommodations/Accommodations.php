<?php

namespace App\Models\Accommodations;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodations\Traits\Relationship\AccommodationsRelationship;
use App\Models\Accommodations\Traits\Attribute\AccommodationsAttribute;

class Accommodations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_accommodations';
    
    use AccommodationsRelationship,
        AccommodationsAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
