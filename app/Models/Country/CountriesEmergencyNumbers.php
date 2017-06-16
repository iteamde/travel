<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country\Traits\Relationship\CountriesEmergencyNumbersRelationship;

class CountriesEmergencyNumbers extends Model
{
    CONST ACTIVE    = 1;
    CONST DEACTIVE  = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries_emergency_numbers';
    
    use CountriesEmergencyNumbersRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['countries_id', 'emergency_numbers_id'];

}