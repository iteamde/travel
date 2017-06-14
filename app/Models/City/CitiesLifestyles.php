<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityLifestylesRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesLifestyles extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_lifestyles';
    
    use CityLifestylesRelationship;
    //     CityAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'lifestyles_id'];
}