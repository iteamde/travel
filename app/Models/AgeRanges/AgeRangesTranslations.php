<?php

namespace App\Models\AgeRanges;

use Illuminate\Database\Eloquent\Model;
use App\Models\AgeRanges\Traits\Relationship\AgeRangesTransRelationship;

class AgeRangesTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_age_ranges_trans';

    public $timestamps = false;

    use AgeRangesTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['age_ranges_id', 'languages_id', 'title' , 'description'];
}
