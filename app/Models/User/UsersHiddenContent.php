<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

/**
 * Class UsersHiddenContent.
 */
class UsersHiddenContent extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_hidden_content';

    /**
     * @return mixed
     */
    public function user(){
        return $this->hasOne( User::class , 'id' , 'users_id');
    }
}
