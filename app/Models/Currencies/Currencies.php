<?php

namespace App\Models\Currencies;

use Illuminate\Database\Eloquent\Model;
use App\Models\Currencies\Traits\Relationship\CurrenciesRelationship;
use App\Models\Currencies\Traits\Attribute\CurrenciesAttribute;

class Currencies extends Model
{
    const ACTIVE    = 1;
    const DEACTIVE  = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_currencies';
    
    use CurrenciesRelationship,
        CurrenciesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id'];
}
