<?php

namespace App\Models\LanguagesSpoken;

use Illuminate\Database\Eloquent\Model;
use App\Models\LanguagesSpoken\Traits\Relationship\LanguagesSpokenTranslationRelationship;

class LanguagesSpokenTranslation extends Model
{
    public $timestamps = false;

    use LanguagesSpokenTranslationRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_languages_spoken_trans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['languages_spoken_id', 'languages_id', 'title' , 'description'];
}
