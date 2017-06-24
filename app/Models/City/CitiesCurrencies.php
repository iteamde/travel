<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Model;
use App\Models\City\Traits\Relationship\CityCurrenciesRelationship;
// use App\Models\City\Traits\Attribute\CityAttribute;

class CitiesCurrencies extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_currencies';
    
    use CityCurrenciesRelationship;
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_id' , 'currencies_id'];
}
