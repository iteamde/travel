<?php

namespace App\Models\Pages\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Access\User\SocialLogin;
use App\Models\Pages\Pages;
use App\Models\SafetyDegree\SafetyDegree;

/**
 * Class PagesRelationship.
 */
trait PagesRelationship
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
     * Many-to-Many relations with PagesTrans.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trans()
    {
        return $this->hasMany(config('pages.pages_trans'), 'pages_id' , 'id');
    }

    public function transsingle()
    {
        return $this->hasOne(config('pages.pages_trans'), 'pages_id' , 'id');
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function medias(){
        return $this->hasMany(config('pages.pages_medias') , 'pages_ids' , 'id');
    }
}
