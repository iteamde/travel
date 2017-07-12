<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

/**
 * Class UsersBlocks.
 */
class UsersBlocks extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_blocks';

    /**
     * @return mixed
     */
    public function user(){
        return $this->hasOne( User::class , 'id' , 'users_id');
    }

    /**
     * @return mixed
     */
    public function block(){
        return $this->hasOne( User::class , 'id' , 'blocks_id');
    }
}
