<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country\Traits\Relationship\CountriesAirportsRelationship;

class CountriesAirports extends Model
{
    CONST ACTIVE    = 1;
    CONST DEACTIVE  = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries_airports';
    
    use CountriesAirportsRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['countries_id', 'places_id'];

}
