<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityAirportRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesAirports extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_airports';
    
    use CityAirportRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'places_id'];
}
