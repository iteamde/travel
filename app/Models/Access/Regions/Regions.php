<?php

namespace App\Models\Access\Regions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;
use App\Models\Access\Regions\Traits\Relationship\RegionsRelationship;
use App\Models\Access\Regions\Traits\Attribute\RegionAttribute;

class Regions extends Model
{
    CONST ACTIVE = 1;
    CONST DEACTIVE = 2;

    use RegionAttribute,
        RegionsRelationship;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_regions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active'];
}
