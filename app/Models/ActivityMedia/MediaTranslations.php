<?php

namespace App\Models\ActivityMedia;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityMedia\Traits\Relationship\MediaTransRelationship;

class MediaTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medias_trans';

    public $timestamps = false;

    use MediaTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['medias_id', 'languages_id', 'title' , 'description'];
}
