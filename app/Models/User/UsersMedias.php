<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use App\Models\ActivityMedia\Media;

/**
 * Class UsersMediasSettings.
 */
class UsersMedias extends Model
{
    public $timestamps = false;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_medias';

    /**
     * @return mixed
     */
    public function user(){
        return $this->hasOne( User::class , 'id' , 'users_id');
    }

    /**
     * @return mixed
     */
    public function media(){
        return $this->hasOne( Media::class , 'id' , 'medias_id');
    }
}
