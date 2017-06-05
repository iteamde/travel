<?php

namespace App\Models\Lifestyle\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\language\Languages;
/**
 * Class LifestyleTranslationRelationship.
 */
trait LifestyleTransRelationship
{

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
