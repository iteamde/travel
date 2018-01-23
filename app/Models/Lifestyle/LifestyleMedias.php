<?php

namespace App\Models\Lifestyle;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lifestyle\Relationship\LifestyleMediasRelationship;

class LifestyleMedias extends Model
{
    CONST ACTIVE    = 1;
    CONST DEACTIVE  = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_lifestyles_medias';
    
    use LifestyleMediasRelationship;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['lifestyles_id', 'medias_id'];

}
