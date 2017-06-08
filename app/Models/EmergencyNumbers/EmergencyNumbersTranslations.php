<?php

namespace App\Models\EmergencyNumbers;

use Illuminate\Database\Eloquent\Model;
use App\Models\EmergencyNumbers\Traits\Relationship\EmergencyNumbersTransRelationship;

class EmergencyNumbersTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_emergency_numbers_trans';

    public $timestamps = false;

    use EmergencyNumbersTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['emergency_numbers_id', 'languages_id', 'title' , 'description'];
}
