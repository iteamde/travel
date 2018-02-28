<?php

namespace App\Models\TripPlans;

use Illuminate\Database\Eloquent\Model;

class TripPlans extends Model
{
    protected $table = 'trips';
    
    public $timestamps = false;
    
    public function cities()
    {
        return $this->belongsToMany('App\Models\City\Cities', 'trips_cities', 'trips_id', 'cities_id')
                ->withPivot('date', 'order');
    }
    
    public function places()
    {
        return $this->belongsToMany('App\Models\Place\Place', 'trips_places', 'trips_id', 'places_id')
                ->withPivot('countries_id', 'cities_id', 'date', 'order', 'time', 'duration', 'budget', 'weather', 'comment');
    }
}
