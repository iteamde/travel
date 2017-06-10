<?php

namespace App\Models\ActivityMedia;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityMedia\Traits\Relationship\MediaRelationship;
use App\Models\ActivityMedia\Traits\Attribute\MediaAttribute;

class Media extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medias';
    
    use MediaRelationship,
        MediaAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id' , 'url'];
}
