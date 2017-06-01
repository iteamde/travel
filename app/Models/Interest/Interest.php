<?php

namespace App\Models\Interest;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interest\Traits\Relationship\InterestRelationship;
use App\Models\Interest\Traits\Attribute\InterestAttribute;

class Interest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_interests';
    
    use InterestRelationship,
        InterestAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'lat', 'lng', 'safety_degree', 'active'];
}
