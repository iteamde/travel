<?php

namespace App\Models\SafetyDegree\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;

/**
 * Class RegionsRelationship.
 */
trait SafetyDegreeRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasMany(config('access.safety_degree_trans'), 'safety_degrees_id');
    }

    public function transsingle()
    {
        // return $this->belongsToMany(config('access.regions'), config('access.regions_trans'), 'id', 'regions_id');
        return $this->hasOne(config('access.safety_degree_trans'), 'safety_degrees_id');
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
    // public function sessions()
    // {
    //     return $this->hasMany(Session::class);
    // }
}
