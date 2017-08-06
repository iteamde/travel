<?php

namespace App\Models\HotelsSearchHistory;

use Illuminate\Database\Eloquent\Model;

class HotelsSearchHistory extends Model
{
    protected $table = 'hotels_search_history';
    protected $fillable = ['admin_id', 'lat', 'lng', 'time'];
    public $timestamps = false;
}
