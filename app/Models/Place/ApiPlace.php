<?php

namespace App\Models\Place;

use App\Models\Place\Place;
use App\Models\ActivityMedia\Media;

class ApiPlace extends Place
{
    public function getResponse(){
        
        $title = '';
        $photo = '';

        $medias      = $this->medias;
        $flag_media  = null;
        $first_media = null;

        if(!empty($medias)){
            foreach ($medias as $key => $value) {
                if(!empty($value->media) && $value->media->featured == 1){
                    $flag_media = $value->media;
                }
                if(!empty($value->media) && $value->media->type == 1 && empty($first_media)){
                    $first_media = $value->media;
                }
            }
        }  

        if(!empty($flag_media)){
            $photo = $flag_media->url;
        }else{
            $photo = $first_media->url;
        }


        if(!empty($this->transsingle)){
            $title = $this->transsingle->title;
        }

        return  [
            'id'           => $this->id,
            'name'         => $title,
            'cover_image'  => $photo 
        ];
    }
}
