<?php

namespace App\Models\EmergencyNumbers;

use Illuminate\Database\Eloquent\Model;
use App\Models\EmergencyNumbers\Traits\Relationship\EmergencyNumbersRelationship;
use App\Models\EmergencyNumbers\Traits\Attribute\EmergencyNumbersAttribute;

class EmergencyNumbers extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_emergency_numbers';
    
    use EmergencyNumbersRelationship,
        EmergencyNumbersAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
