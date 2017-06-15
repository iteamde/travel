<?php

namespace App\Models\Religion;

use Illuminate\Database\Eloquent\Model;
use App\Models\Religion\Traits\Relationship\ReligionRelationship;
use App\Models\Religion\Traits\Attribute\ReligionAttribute;

class Religion extends Model
{
    CONST ACTIVE   = 1;
    CONST DEACTIVE = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_religions';
    
    use ReligionRelationship,
        ReligionAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'lat', 'lng', 'safety_degree', 'active'];
}
