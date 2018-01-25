<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityAdditionalLanguagesSpokenRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesAdditionalLanguages extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_additional_languages';
    
    use CityAdditionalLanguagesSpokenRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'languages_spoken_id'];
}
