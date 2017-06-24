<?php

namespace App\Models\Restaurants;

use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants\Traits\Relationship\RestaurantsMediasRelationship;

class RestaurantsMedias extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'restaurants_medias';

    public $timestamps = false;

    use RestaurantsMediasRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['restaurants_id', 'medias_id'];
}
