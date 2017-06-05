<?php

namespace App\Models\Levels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Levels\Traits\Relationship\LevelsRelationship;
use App\Models\Levels\Traits\Attribute\LevelsAttribute;

class Levels extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_levels';
    
    use LevelsRelationship,
        LevelsAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
