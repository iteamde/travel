<?php

namespace App\Models\Hotels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hotels\Traits\Relationship\HotelsMediasRelationship;

class HotelsMedias extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotels_medias';

    public $timestamps = false;

    use HotelsMediasRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hotels_id', 'medias_id'];
}
