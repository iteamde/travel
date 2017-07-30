<?php

namespace App\Models\PlaceSearchHistory;

use Illuminate\Database\Eloquent\Model;

class PlaceSearchHistory extends Model
{
    protected $table = 'places_search_history';
    protected $fillable = ['admin_id', 'lat', 'lng', 'time'];
    public $timestamps = false;
}
