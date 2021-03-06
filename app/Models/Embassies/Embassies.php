<?php

namespace App\Models\Embassies;

use Illuminate\Database\Eloquent\Model;
use App\Models\Embassies\traits\Relationship\EmbassiesRelationship2;
use App\Models\Embassies\traits\Attribute\EmbassiesAttribute;

class Embassies extends Model
{
    CONST ACTIVE    = 1;
    CONST DEACTIVE  = 2;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'embassies';
    
    use EmbassiesRelationship2,
        EmbassiesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['countries_id', 'lat', 'lng', 'active'];

    public function deleteTrans(){
        self::deleteModels($this->trans);
    }

    public function deleteModels($models){
        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
