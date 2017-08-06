<?php

namespace App\Models\RestaurantsSearchHistory;

use Illuminate\Database\Eloquent\Model;

class RestaurantsSearchHistory extends Model
{
    protected $table = 'restaurants_search_history';
    protected $fillable = ['admin_id', 'lat', 'lng', 'time'];
    public $timestamps = false;
}
