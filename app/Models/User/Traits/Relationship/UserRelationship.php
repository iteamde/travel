<?php

namespace App\Models\User\Traits\Relationship;

use App\Models\System\Session;
use App\Models\User\SocialLogin;
use App\Models\User\UsersFriends;
use App\Models\User\UsersBlocks;
use App\Models\User\UsersHiddenContent;
use App\Models\User\UsersFriendRequests;

/**
 * Class UserRelationship.
 */
trait UserRelationship
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
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return mixed
     */
    public function user_friends(){
        
        return $this->hasMany(UsersFriends::class, 'users_id', 'id');
    }

    /**
     * @return mixed
     */
    public function user_blocks(){
        
        return $this->hasMany(UsersBlocks::class, 'users_id', 'id');
    }

    /**
     * @return mixed
     */
    public function user_hidden_content(){
        
        return $this->hasMany(UsersHiddenContent::class, 'users_id', 'id');
    }

    /**
     * @return mixed
     */
    public function my_friend_requests(){
        return $this->hasMany(UsersFriendRequests::class, 'to', 'id');
    }
}
