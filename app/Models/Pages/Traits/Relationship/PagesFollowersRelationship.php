<?php

namespace App\Models\Pages\Traits\Relationship;

use App\Models\User\User;

/**
 * Class PagesFollowersRelationship.
 */
trait PagesFollowersRelationship
{
    public function user()
    {
        return $this->hasOne(User::class , 'id' , 'users_id');
    }
}
