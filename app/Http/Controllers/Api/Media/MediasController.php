<?php

namespace App\Http\Controllers\Api\Media;

/* Dependencies */
use App\Models\ActivityMedia\ApiMedia as Media;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class MediasController.
 */
class MediasController extends Controller
{
    public function create(Request $request){
        
        $response = Media::create($request);

        return $response;
    }
}
