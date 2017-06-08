<?php

namespace App\Models\Currencies;

use Illuminate\Database\Eloquent\Model;
use App\Models\Currencies\Traits\Relationship\CurrenciesTransRelationship;

class CurrenciesTranslations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_currencies_trans';

    public $timestamps = false;

    use CurrenciesTransRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['currencies_id', 'languages_id', 'title' , 'description'];
}
