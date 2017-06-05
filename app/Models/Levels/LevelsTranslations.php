<?php

namespace App\Models\Levels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Levels\Traits\Relationship\LevelsTransRelationship;

class LevelsTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_levels_trans';

    public $timestamps = false;

    use LevelsTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['levels_id', 'languages_id', 'title'];
}
