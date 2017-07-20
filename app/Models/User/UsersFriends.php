<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

/**
 * Class UsersFriends.
 */
class UsersFriends extends Model
{
    public $timestamps = false;
    
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_friends';

    /**
     * @return mixed
     */
    public function user(){
        return $this->hasOne( User::class , 'id' , 'users_id');
    }

    /**
     * @return mixed
     */
    public function friend(){
        return $this->hasOne( User::class , 'id' , 'friends_id');
    }
}
