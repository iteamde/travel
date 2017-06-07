<?php

namespace App\Models\Holidays;

use Illuminate\Database\Eloquent\Model;
use App\Models\Holidays\Traits\Relationship\HolidaysTransRelationship;

class HolidaysTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_holidays_trans';

    public $timestamps = false;

    use HolidaysTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['holidays_id', 'languages_id', 'title' , 'description'];
}
