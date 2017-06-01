<?php

namespace App\Models\ActivityTypes;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityTypes\Traits\Relationship\ActivityTypesTransRelationship;

class ActivityTypesTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_activities_types_trans';

    public $timestamps = false;

    use ActivityTypesTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id', 'language_id', 'title', 'description', 'nationality', 'population', 'best_place', 'best_time', 'cost_of_living', 'geo_stats', 'demographics', 'economy', 'suitable_for', 'user_rating', 'num_cities'];
}
