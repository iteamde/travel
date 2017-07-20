<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use App\Models\Activity\Traits\Relationship\ActivityRelationship;
use App\Models\Activity\Traits\Attribute\ActivityAttribute;

class UrlGenerator
{   

    public static function GetUploadsUrl(){
        
        /* Change this url to your sites upload directory */
        // $url = asset('storage');
        /* Local Url */
        // $url = 'localhost/travoo-api/storage/uploads/';
        /* Travooo Site Url */
        $url = 'storage.travooo.com/';
        
        return $url;
    }   
}
