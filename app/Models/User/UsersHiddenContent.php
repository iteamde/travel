<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

/**
 * Class UsersHiddenContent.
 */
class UsersHiddenContent extends Model
{
    const CONTENT_MEDIA = 1;
	/**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_hidden_content';

    public $timestamps = false;

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

    public function getArrayResponse(){

        $response = [
            'id' => $this->id,
            'users_id' => $this->users_id,
            'content_id' => $this->content_id,
            'created_at' => $this->created_at
        ];

        if($this->content_type == Self::CONTENT_MEDIA){
            $response = array_merge($response,[
                'content_type' => 'media'
            ]);
        }

        return $response;
    }
}
