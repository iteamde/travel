<?php

namespace App\Models\Cultures;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cultures\Traits\Relationship\CulturesRelationship;
use App\Models\Cultures\Traits\Attribute\CulturesAttribute;

class Cultures extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_cultures';
    
    use CulturesRelationship,
        CulturesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
