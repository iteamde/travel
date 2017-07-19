<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

/**
 * Class UsersFriendRequests.
 */
class UsersFriendRequests extends Model
{
    public $timestamps = false;
    
    const STATUS_PENDING = 0;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_friend_requests';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    /**
     * @return mixed
     */
    public function from(){
        return $this->hasOne( User::class , 'id' , 'from');
    }

    /**
     * @return mixed
     */
    public function to(){
        return $this->hasOne( User::class , 'id' , 'to');
    }
}