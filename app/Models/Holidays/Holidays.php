<?php

namespace App\Models\Holidays;

use Illuminate\Database\Eloquent\Model;
use App\Models\Holidays\Traits\Relationship\HolidaysRelationship;
use App\Models\Holidays\Traits\Attribute\HolidaysAttribute;

class Holidays extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_holidays';
    
    use HolidaysRelationship,
        HolidaysAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
