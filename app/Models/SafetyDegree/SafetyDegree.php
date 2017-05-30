<?php

namespace App\Models\SafetyDegree;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;
use App\Models\SafetyDegree\Relationship\SafetyDegreeRelationship;
use App\Models\SafetyDegree\Traits\Attribute\SafetyDegreeAttribute;

class SafetyDegree extends Model
{

    // use RegionAttribute,
    //     RegionsRelationship;

    use SafetyDegreeAttribute,
        SafetyDegreeRelationship;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_safety_degrees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['active'];
}
