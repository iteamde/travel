<?php

namespace App\Models\Weekdays;

use Illuminate\Database\Eloquent\Model;
use App\Models\Weekdays\Traits\Relationship\WeekdaysTransRelationship;

class WeekdaysTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_weekdays_trans';

    public $timestamps = false;

    use WeekdaysTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['weekdays_id', 'languages_id', 'title' , 'description'];
}
