<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

/**
 * Class UsersPrivacySettings.
 */
class UsersPrivacySettings extends Model
{
    public $timestamps = false;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_privacy_settings';

    /**
     * @return mixed
     */
    public function user(){
        return $this->hasOne( User::class , 'id' , 'users_id');
    }
}
