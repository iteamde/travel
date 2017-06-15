<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityReligionsRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesReligions extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_religions';
    
    use CityReligionsRelationship;
    //     CityAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'religions_id'];
}