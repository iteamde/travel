<?php

namespace App\Models\EmbassiesSearchHistory;

use Illuminate\Database\Eloquent\Model;

class EmbassiesSearchHistory extends Model
{
    protected $table = 'embassies_search_history';
    protected $fillable = ['admin_id', 'lat', 'lng', 'time'];
    public $timestamps = false;
}
