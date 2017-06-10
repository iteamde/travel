<?php

namespace App\Models\ActivityMedia\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\ActivityMedia\Media;
use App\Models\SafetyDegree\SafetyDegree;

/**
 * Class MediaRelationship.
 */
trait MediaRelationship
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
     * Many-to-Many relations with MediaTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        return $this->hasMany(config('activitymedia.media_trans'), 'medias_id' , 'id');
    }

    public function transsingle()
    {
        return $this->hasOne(config('activitymedia.media_trans'), 'medias_id' , 'id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
