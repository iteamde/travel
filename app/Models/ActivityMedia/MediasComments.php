<?php

namespace App\Models\ActivityMedia;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use App\Models\ActivityMedia\Media;

/**
 * Class MediasComments.
 */
class MediasComments extends Model
{
    public $timestamps = false;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'medias_comments';

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
        return $this->hasOne( User::class , 'id' , 'medias_id');
    }
}
