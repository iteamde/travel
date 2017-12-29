<?php

namespace App\Models\Embassies\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Regions\Regions;
use App\Models\SafetyDegree\SafetyDegree;
use App\Models\Country\Countries;
use App\Models\Embassies\EmbassiesMedias;

/**
 * Class EmbassiesRelationship.
 */
trait EmbassiesRelationship
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
        return $this->hasMany(config('embassies.embassies_trans'), 'embassies_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('embassies.embassies_trans'), 'embassies_id');
    }  

    public function city()
    {
        return $this->hasOne(Cities::class , 'id' , 'cities_id');
    }

    /**
     * One-to-One relations with Countries.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToOne
     */
    public function country()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne( Countries::class  , 'id' , 'countries_id');
    }

    public function medias()
    {
        return $this->hasMany(EmbassiesMedias::class , 'embassies_id' , 'id');
    }
}
