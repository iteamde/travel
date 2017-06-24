<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityEmergencyNumberRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesEmergencyNumbers extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_emergency_numbers';
    
    use CityEmergencyNumberRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'emergency_numbers_id'];
}
