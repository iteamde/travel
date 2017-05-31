<?php

namespace App\Models\Country\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;

/**
 * Class UserRelationship.
 */
trait CountriesRelationship
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
     * @return mixed
     */
    public function region()
    {
        return $this->hasOne(Regions::class , 'id' , 'regions_id');
    }

    /**
     * @return mixed
     */
    public function degree()
    {
        return $this->hasOne(SafetyDegree::class , 'id' , 'safety_degree_id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
