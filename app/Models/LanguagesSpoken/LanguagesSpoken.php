<?php

namespace App\Models\LanguagesSpoken;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;
use App\Models\LanguagesSpoken\Traits\Relationship\LanguagesSpokenRelationship;
use App\Models\LanguagesSpoken\Traits\Attribute\LanguagesSpokenAttribute;

class LanguagesSpoken extends Model
{
    CONST ACTIVE = 1;
    CONST DEACTIVE = 2;

    use LanguagesSpokenAttribute,
        LanguagesSpokenRelationship;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_languages_spoken';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active'];
}
