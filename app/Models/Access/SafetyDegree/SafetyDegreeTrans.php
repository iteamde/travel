<?php

namespace App\Models\Access\SafetyDegree;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;
// use App\Models\Access\Regions\Traits\Relationship\RegionsRelationship;
// use App\Models\Access\Regions\Traits\Attribute\RegionAttribute;

class SafetyDegreeTrans extends Model
{

    // use RegionAttribute,
    //     RegionsRelationship;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_safety_degree_trans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];
}
