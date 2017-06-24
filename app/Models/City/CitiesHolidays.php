<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityHolidaysRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesHolidays extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_holidays';
    
    use CityHolidaysRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'holidays_id'];
}
