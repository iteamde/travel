<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pages\Traits\Relationship\PagesRelationship;
use App\Models\Pages\Traits\Attribute\PagesAttribute;

class Pages extends Model
{   
    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 2;
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

    /**
     * @return mixed
     **/
    public function deleteAdmins(){
        $this->deleteModels($this->admins);
    }

    /**
     * @return mixed
     **/
    public function deleteFollowers(){
        $this->deleteModels($this->followers);
    }

    /**
     * @return mixed
     **/
    public function deleteMedias(){
        $this->deleteModels($this->medias);
    }

    /**
     * @return mixed
     **/
    public function deleteModels($models){
        if(!empty($models)){
            foreach ($models as $key => $value) {
                $value->delete();
            }
        }
    }
}
