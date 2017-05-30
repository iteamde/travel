<?php

namespace App\Models\SafetyDegree\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\language\Languages;
/**
 * Class RegionsTranslationRelationship.
 */
trait SafetyDegreeTransRelationship
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
