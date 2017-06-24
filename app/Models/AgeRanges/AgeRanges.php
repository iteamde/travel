<?php

namespace App\Models\AgeRanges;

use Illuminate\Database\Eloquent\Model;
use App\Models\AgeRanges\Traits\Relationship\AgeRangesRelationship;
use App\Models\AgeRanges\Traits\Attribute\AgeRangesAttribute;

class AgeRanges extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_age_ranges';
    
    use AgeRangesRelationship,
        AgeRangesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'active', 'from', 'to'];
}
