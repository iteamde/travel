<?php

namespace App\Models\LanguagesSpoken\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\language\Languages;
/**
 * Class LanguagesSpokenTranslationRelationship.
 */
trait LanguagesSpokenTranslationRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.role_user_table'), 'user_id', 'role_id');
    }

    /**
     * @return mixed
     */
    public function translanguage()
    {
        return $this->belongsTo(Languages::class, 'languages_id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
