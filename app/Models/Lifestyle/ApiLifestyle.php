<?php

namespace App\Models\Lifestyle;

use App\Models\Lifestyle\Lifestyle;

class ApiLifestyle extends Lifestyle
{
    public function getResponse(){
        
        $title = $this->title;

        return  [
            'id'                => $this->lId,
            'name'              => $title,
            'cover_image' 		=> ''
        ];
    }
}
