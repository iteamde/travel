<?php

namespace App\Models\Weekdays;

use Illuminate\Database\Eloquent\Model;
use App\Models\Weekdays\Traits\Relationship\WeekdaysRelationship;
use App\Models\Weekdays\Traits\Attribute\WeekdaysAttribute;

class Weekdays extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_weekdays';
    
    use WeekdaysRelationship,
        WeekdaysAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
