<?php

namespace App\Models\Activity;

use Illuminate\Database\Eloquent\Model;
use App\Models\Activity\Traits\Relationship\ActivityRelationship;
use App\Models\Activity\Traits\Attribute\ActivityAttribute;

class Activity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activities';
    
    use ActivityRelationship,
        ActivityAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'lat', 'lng', 'safety_degree', 'active'];
}
