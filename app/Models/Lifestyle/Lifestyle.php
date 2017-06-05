<?php

namespace App\Models\Lifestyle;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;
use App\Models\Lifestyle\Relationship\LifestyleRelationship;
use App\Models\Lifestyle\Traits\Attribute\LifestyleAttribute;

class Lifestyle extends Model
{

    // use RegionAttribute,
    //     RegionsRelationship;

    use LifestyleAttribute,
        LifestyleRelationship;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_lifestyles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['active'];
}
