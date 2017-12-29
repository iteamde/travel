<?php

namespace App\Models\Embassies;

use Illuminate\Database\Eloquent\Model;
use App\Models\Embassies\Traits\Relationship\EmbassiesTransRelationship;

class EmbassiesTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'embassies_trans';

    public $timestamps = false;

    use EmbassiesTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['embassies_id', 'languages_id', 'title', 'description', 'population', 'best_place', 'best_time', 'cost_of_living', 'geo_stats', 'demographics', 'economy', 'suitable_for', 'user_rating', 'num_cities'];
}
