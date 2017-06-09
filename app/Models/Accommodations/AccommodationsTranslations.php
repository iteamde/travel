<?php

namespace App\Models\Accommodations;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accommodations\Traits\Relationship\AccommodationsTransRelationship;

class AccommodationsTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_accommodations_trans';

    public $timestamps = false;

    use AccommodationsTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['accommodations_id', 'languages_id', 'title'];
}
