<?php

namespace App\Models\Lifestyle;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;
// use App\Models\Access\Regions\Traits\Relationship\RegionsRelationship;
// use App\Models\Access\Regions\Traits\Attribute\RegionAttribute;
use App\Models\Lifestyle\Relationship\LifestyleTransRelationship;

class LifestyleTrans extends Model
{

    // use RegionAttribute,
        // RegionsRelationship;
    use LifestyleTransRelationship;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_lifestyles_trans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];
}
