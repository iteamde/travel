<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

/**
 * Class UsersFriends.
 */
class UsersFriends extends Model
{
    public $table = 'users_friends';

    public function user(){
        return $this->hasOne( User::class , 'id' , 'users_id');
    }

    public function friend(){
        return $this->hasOne( User::class , 'id' , 'friends_id');
    }
}
