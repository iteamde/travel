<?php

namespace App\Models\Timings;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timings\Traits\Relationship\TimingsRelationship;
use App\Models\Timings\Traits\Attribute\TimingsAttribute;

class Timings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_timings';
    
    use TimingsRelationship,
        TimingsAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
