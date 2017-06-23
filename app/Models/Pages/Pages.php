<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pages\Traits\Relationship\PagesRelationship;
use App\Models\Pages\Traits\Attribute\PagesAttribute;

class Pages extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';
    
    use PagesRelationship,
        PagesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id' , 'active' , 'url'];

    public function deleteAdmins(){
        $this->deleteModels($this->admins);
    }

    public function deleteFollowers(){
        $this->deleteModels($this->followers);
    }

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
