<?php

namespace App\Models\Access\language;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;

class Languages extends Model
{
    CONST LANG_ACTIVE = 1;
    CONST LANG_DEACTIVE = 2;

    use LanguageAttribute;
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'code', 'active'];
}
