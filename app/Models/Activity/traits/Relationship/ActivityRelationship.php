<?php

namespace App\Models\Activity\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Country\Countries;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\City\Cities;
use App\Models\ActivityTypes\ActivityTypes;

/**
 * Class ActivityRelationship.
 */
trait ActivityRelationship
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
     * Many-to-Many relations with CountriesTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('activities.activities_trans_model'), 'activities_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('activities.activities_trans_model'), 'activities_id');
    }

    /**
     * @return mixed
     */
    public function country()
    {
        return $this->hasOne(Countries::class , 'id' , 'countries_id');
    }

    /**
     * @return mixed
     */
    public function city()
    {
        return $this->hasOne(Cities::class , 'id' , 'cities_id');
    }

    /**
     * @return mixed
     */
    public function degree()
    {
        return $this->hasOne(SafetyDegree::class , 'id' , 'safety_degrees_id');
    }

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->hasOne(ActivityTypes::class , 'id' , 'types_id');
    }

    

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
