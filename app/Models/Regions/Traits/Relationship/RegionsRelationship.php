<?php

namespace App\Models\Regions\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;

/**
 * Class RegionsRelationship.
 */
trait RegionsRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('locations.regions_trans'), 'regions_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('locations.regions_trans'), 'regions_id');
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
