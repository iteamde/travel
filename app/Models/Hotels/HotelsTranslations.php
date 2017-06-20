<?php

namespace App\Models\Hotels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hotels\Traits\Relationship\HotelsTransRelationship;

class HotelsTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotels_trans';

    public $timestamps = false;

    use HotelsTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hotels_id', 'languages_id', 'title', 'description', 'working_days', 'working_times', 'how_to_go', 'when_to_go', 'num_activities', 'popularity', 'conditions'];
}
