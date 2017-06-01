<?php

namespace App\Models\Interest;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interest\Traits\Relationship\InterestTransRelationship;

class InterestTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_interestes_trans';

    public $timestamps = false;

    use InterestTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id', 'language_id', 'title', 'description', 'nationality', 'population', 'best_place', 'best_time', 'cost_of_living', 'geo_stats', 'demographics', 'economy', 'suitable_for', 'user_rating', 'num_cities'];
}
