<?php

namespace App\Models\Restaurants;

use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants\Traits\Relationship\RestaurantsTransRelationship;

class RestaurantsTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'restaurants_trans';

    public $timestamps = false;

    use RestaurantsTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['restaurants_id', 'languages_id', 'title', 'description', 'working_days', 'working_times', 'how_to_go', 'when_to_go', 'num_activities', 'popularity', 'conditions'];
}
