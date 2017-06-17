<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country\Traits\Relationship\CountriesHolidaysRelationship;

class CountriesHolidays extends Model
{
    CONST ACTIVE    = 1;
    CONST DEACTIVE  = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries_holidays';
    
    use CountriesHolidaysRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['countries_id', 'holidays_id'];

}
