<?php

namespace App\Models\LanguagesSpoken\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;

/**
 * Class LanguagesSpokenRelationship.
 */
trait LanguagesSpokenRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('languages_spoken.languages_spoken_trans'), 'languages_spoken_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('languages_spoken.languages_spoken_trans'), 'languages_spoken_id');
    }
    /**
     * @return mixed
     */
    // public function trans()
    // {
    //     return $this->hasMany(config('access.regions_trans'));
    // }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
