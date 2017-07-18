<?php

namespace App\Models\ActivityMedia;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use App\Models\ActivityMedia\Media;

/**
 * Class MediasShares.
 */
class MediasShares extends Model
{
    public $timestamps = false;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'medias_shares';

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
