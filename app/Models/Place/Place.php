<?php

namespace App\Models\Place;

use Illuminate\Database\Eloquent\Model;
use App\Models\Place\Traits\Relationship\PlaceRelationship;
use App\Models\Place\Traits\Attribute\PlaceAttribute;

class Place extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'places';
    
    use PlaceRelationship,
        PlaceAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['region_id', 'code', 'lat', 'lng', 'safety_degree', 'active'];

    /**
     * @return mixed
     **/
    public function deleteMedias(){
        $this->deleteModals($this->medias);
    }

    /**
     * @return mixed
     **/
    public function deleteModals($models){
        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
