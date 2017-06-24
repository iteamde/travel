<?php

namespace App\Models\ActivityTypes;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityTypes\Traits\Relationship\ActivityTypesRelationship;
use App\Models\ActivityTypes\Traits\Attribute\ActivityTypesAttribute;

class ActivityTypes extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_activities_types';
    
    use ActivityTypesRelationship,
        ActivityTypesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'activities_types_id', 'languages_id', 'title', 'description'];
}
