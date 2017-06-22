<?php

namespace App\Models\Hotels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hotels\Traits\Relationship\HotelsRelationship;
use App\Models\Hotels\Traits\Attribute\HotelsAttribute;

class Hotels extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hotels';
    
    use HotelsRelationship,
        HotelsAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['countries_id' , 'cities_id' , 'places_id', 'lat', 'lng', 'active'];
    
    public function deleteMedias(){
        $this->deleteModals($this->medias);
    }

    public function deleteModals($models){
        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
