<?php

namespace App\Models\Hobbies;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hobbies\Traits\Relationship\HobbiesRelationship;
use App\Models\Hobbies\Traits\Attribute\HobbiesAttribute;

class Hobbies extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_hobbies';
    
    use HobbiesRelationship,
        HobbiesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
