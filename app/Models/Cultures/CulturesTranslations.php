<?php

namespace App\Models\Cultures;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cultures\Traits\Relationship\CulturesTransRelationship;

class CulturesTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_cultures_trans';

    public $timestamps = false;

    use CulturesTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cultures_id', 'languages_id', 'title' , 'description'];
}
