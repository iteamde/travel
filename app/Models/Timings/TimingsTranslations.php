<?php

namespace App\Models\Timings;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timings\Traits\Relationship\TimingsTransRelationship;

class TimingsTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_timings_trans';

    public $timestamps = false;

    use TimingsTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['timings_id', 'languages_id', 'title' , 'description'];
}
