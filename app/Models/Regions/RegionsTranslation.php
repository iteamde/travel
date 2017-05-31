<?php

namespace App\Models\Regions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Regions\Traits\Relationship\RegionsTranslationRelationship;
class RegionsTranslation extends Model
{
    public $timestamps = false;

    use RegionsTranslationRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_regions_trans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'language_id', 'title'];
}
