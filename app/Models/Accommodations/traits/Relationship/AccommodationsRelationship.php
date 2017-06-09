<?php

namespace App\Models\Accommodations\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Accommodations\Accommodations;
use App\Models\SafetyDegree\SafetyDegree;

/**
 * Class AccommodationsRelationship.
 */
trait AccommodationsRelationship
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
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }

    /**
     * Many-to-Many relations with AccommodationsTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        return $this->hasMany(config('accommodations.accommodations_trans'), 'accommodations_id' , 'id');
    }

    public function transsingle()
    {
        return $this->hasOne(config('accommodations.accommodations_trans'), 'accommodations_id' , 'id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
