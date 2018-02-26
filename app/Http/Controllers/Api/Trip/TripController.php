<?php

namespace App\Http\Controllers\Api\Trip;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function postNew(Request $request){

        $post = $request->input();
        
        dd($post['user_id']);

    }
}
