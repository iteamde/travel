<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityLanguagesSpokenRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesLanguagesSpoken extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_languages_spoken';
    
    use CityLanguagesSpokenRelationship;
    //     CityAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'languages_spoken_id'];
}
