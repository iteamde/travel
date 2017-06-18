<?php

namespace App\Models\Regions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Language\Traits\Attribute\LanguageAttribute;
use App\Models\Regions\Traits\Relationship\RegionsRelationship;
use App\Models\Regions\Traits\Attribute\RegionAttribute;

class Regions extends Model
{
    CONST ACTIVE = 1;
    CONST DEACTIVE = 2;

    use RegionAttribute,
        RegionsRelationship;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conf_regions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active'];

    public function deleteMedias(){
        $this->deleteModels($this->medias);
    }

    public function deleteModels($models){

        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
