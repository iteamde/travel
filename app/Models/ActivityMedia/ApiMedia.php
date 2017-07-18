<?php

namespace App\Models\ActivityMedia;

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Models\User\ApiUser as User;
use App\Models\System\Session;
use App\Models\User\UsersMedias;
use App\Models\ActivityMedia\MediasComments;
use App\Models\ActivityMedia\MediasLikes;

class ApiMedia extends Media
{
    /* Create Media For User Function */
    public static function create($request){
        
        $post = $request->input();
        
        /* If User Id Is Not Set Or Is Empty, Return Error */
        if(! isset($post['user_id']) || empty($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Given User Id */
        $user = User::where(['id' => $post['user_id']])->first();
            
        /* If User Not Found For The Provided Id, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Session Token Is Not Set, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session Id */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches User Id, Return Error */
        if($session->user_id != $post['user_id']){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Language Id Is Not Set Or Is Empty, Return Error */
        if( !isset($post['language_id']) || empty($post['language_id']) ){
            return Self::generateErrorMessage(false, 400, 'Language Id Not Provided.');
        }   

        /* If Language Id Is Not An Integer, Return Error */
        if(! is_numeric($post['language_id'])){
            return Self::generateErrorMessage(false, 400, 'Language Id Should Be An Integer.');
        }

        /* If File Is Not Uploaded, Return Error */
        if( !$request->hasFile('media_file') ){
            /* If Old Picture Exists For This User, Remove It. */
            return Self::generateErrorMessage(false, 400, 'File Not Provided For Upload.');
        }

        /* Check That Uploads Directory Exists, If Not Create It */
        $path = storage_path() . DIRECTORY_SEPARATOR . 'uploads';
        if( !is_dir( $path ) ){
            mkdir($path, 0755);
        }

        /* Check That Medias Directory Exists, If Not Create It */
        $path .= DIRECTORY_SEPARATOR . 'medias';
        if( !is_dir( $path ) ){
            mkdir($path, 0755);
        }        

        /* Check That Users Directory Exists, If Not Create It */
        $path .= DIRECTORY_SEPARATOR . 'users';
        if( !is_dir( $path ) ){
            mkdir($path, 0755);
        }

        /* Check That User's Id Directory Exists, If Not Create It */
        $path .= DIRECTORY_SEPARATOR . $post['user_id'];
        if( !is_dir( $path ) ){
            mkdir($path, 0755);
        }

        $path .= DIRECTORY_SEPARATOR;

         /* Upload File */
        $new_file_name = time() . '_media.' . $request->media_file->extension();
        $new_path = '/uploads/medias/users/' . $post['user_id'];
        $request->media_file->storeAs( $new_path , $new_file_name);
        /* Upload File End */


        $media = new Self;
        $media_translation = new MediaTranslations;
        $user_media = new UsersMedias;

        /* New Url Of Uploaded Image */
        $media_url = asset('/storage' . $new_path . '/' . $new_file_name);

        $media->url = $media_url;
        $media->save();

        $media_translation->medias_id = $media->id; 

        /* If Description Of Media Is Set, Save It */
        if( isset($post['media_description']) && !empty($post['media_description']) ){
            $media_translation->description = $post['media_description']; 
        }
        
        $media_translation->languages_id = $post['language_id'];

        /* Save Updated Image Name In User's Table */
        $media_translation->title = $new_file_name;
        $media_translation->save(); 
        
        /* Return Success Status, And Successfull Message */       
        return [
            'success' => true,
            'data' => [
                'message' => 'Media Created Successfully',
                'url' => $media->url
            ]
        ];
    }

    /* Function For Adding Comment To A Media */
    public static function comment($request){

        /* Get Post Array From Request */
        $post = $request->input();

        /* If User Id Is Not Provided, or Is Empty, Return Error */
        if( !isset($post['user_id']) || empty($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* If User Id Is Not An Number, Return Error */
        if(! is_numeric($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');    
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id']])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Session Token Not Provided, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token'] ])->first();

        /* If Session Not Found For Provided Session Token, Return Error */
        if( empty($session) ){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.' );
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if( $session->user_id != $post['user_id']){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Medias Id Not Provided, Return Error */
        if(!isset($post['medias_id']) || empty($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias Id Not Provided.');
        }

        /* Find Media For The Provided Media Id */
        $media = Self::where(['id' => $post['medias_id'] ])->first();

        /* If Media Not Found For The Provided Media Id, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong Media Id Provided.');
        }

        /* If Comment Is Not Provided, Or Is Empty, Return Error */
        if(!isset($post['comment']) || empty($post['comment']) ){
            return Self::generateErrorMessage(false, 400, 'Comment Not Provided.');
        }

        /* Create New Comment */
        $comment = new MediasComments;

        /* Load Information In Comment */
        $comment->users_id = $post['user_id'];
        $comment->medias_id = $post['medias_id'];
        $comment->comment = "comment_test: " . $post['comment'] . ',';
        $comment->created_at = Date('Y-m-d h:i:s');
        
        /* If Parent Comment Id Is Set, Save Parent Id Info, Else Put 0 In The Parent Id Field. */
        if(!isset($post['parent_comment_id']) || empty($post['parent_comment_id']) ){
            $comment->reply_to = 0;
        }else{
            /* If Parent Id Field Id Not Empty, Find Parent Comment For Provided Parent Id */
            $parent_comment = MediasComments::where(['id' => $post['parent_comment_id']])->first();
            
            /* If Parent Is Not Found, Return Error */
            if(!empty($parent_comment)){
                $comment->reply_to = $post['parent_comment_id'];
            }else{
                return Self::generateErrorMessage(false, 400, 'Wrong Parent Comment Id Provided.');
            }
        }

        /* Save Comment Information To Database */
        $comment->save();
        
        /* If Picture Is Provided In The POST Arguments */
        if($request->hasFile('picture')){
            
            /* Check That Uploads Directory Exists, If Not Create It */
            $path = storage_path() . DIRECTORY_SEPARATOR . 'uploads';
            if( !is_dir( $path ) ){
                mkdir($path, 0755);
            }

            /* Check That Medias Directory Exists, If Not Create It */
            $path .= DIRECTORY_SEPARATOR . 'medias';
            if( !is_dir( $path ) ){
                mkdir($path, 0755);
            }        

            /* Check That Users Directory Exists, If Not Create It */
            $path .= DIRECTORY_SEPARATOR . 'comments';
            if( !is_dir( $path ) ){
                mkdir($path, 0755);
            }

            /* Check That User's Id Directory Exists, If Not Create It */
            $path .= DIRECTORY_SEPARATOR . $comment->id;
            if( !is_dir( $path ) ){
                mkdir($path, 0755);
            }

            $path .= DIRECTORY_SEPARATOR;

            /* Upload File */
            $new_file_name = time() . '_comment.' . $request->picture->extension();
            $new_path = '/uploads/medias/comments/' . $comment->id;
            $request->picture->storeAs( $new_path , $new_file_name);
            /* Upload File End */
            
            /* New Url Of Uploaded Image */
            $media_url = asset('/storage' . $new_path . '/' . $new_file_name);

            /* Save Url Of Uploaded Image In Comment Object */
            $comment->comment .= "comment_url: " . $media_url;
            
            /* Save Comment Information */
            $comment->save();
        }

        return [
            'status' => true,
            'data' => [
                'message' => 'Comment Added Successfully.'
            ]
        ];
    }

    /* Media Like Function */
    public static function like($request){

        /* Get Post Arguments From Request */
        $post = $request->input();

        /* if User Id Is Not Provided, Or Is Empty, Return Error */
        if( !isset($post['user_id']) || empty($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id']])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Session Token Not Provided, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* if Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* if Session's User Id Doesn't Matches Provided User Id, Return Error */
        if($session->user_id != $post['user_id']){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Medias Id Not Provided, Or Is Empty, Return Error */
        if( !isset($post['medias_id']) || empty($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias Id Not Provided.');
        }

        /* If Medias id Is Not An Integer, Return Error */
        if(! is_numeric($post['medias_id'])){
            return Self::generateErrorMessage(false, 400, 'Medias Id Should Be An Integer.');
        }

        /* Find Media For The Provided Media Id */
        $media = Self::where(['id' => $post['medias_id'] ])->first();

        /* if Media Not Found, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong Media Id Provided.');
        }

        /* Create New Media Like */
        $like = new MediasLikes;

        /* Save Information In MediasLikes Model */
        $like->users_id = $post['user_id'];
        $like->medias_id = $post['medias_id'];

        /* Save Information To Database */
        $like->save();

        /* Return Success Status, With Success Message */
        return [
            'status' => true,
            'data'   => [
                'message' => 'Media Liked Successfully.'
            ]
        ];
    }

    /* Unlike Function */
    public static function unlike($request){

        /* Get Post Arguments From Request Input */
        $post = $request->input();

        /* If User Id Not Provided, Or Is Empty, Return Error */
        if( !isset($post['user_id']) || empty($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id']])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }   

        /* If Session Token Not Provided, Or Is Empty, Return Error */
        if(!isset($post['session_token']) || empty($post['session_token'])){
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if($session->user_id != $post['user_id']){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Medias Id Not Provided, Or Is Empty, Return Error */
        if(!isset($post['medias_id']) || empty($post['medias_id'])){
            return Self::generateErrorMessage(false, 400, 'Medias Id Not Provided.');
        }

        /* If Medias Id Is Not An Integer, Return Error */
        if(! is_numeric($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias Id Should Be An Integer.');
        }

        /* Find Media For The Provided Media Id */
        $media = Self::where(['id' => $post['medias_id']])->first();

        /* If Media Not Found, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong Media Id Provided.');
        }

        /* Find Media Like For The Provided Media id And User Id */
        $like = MediasLikes::where(['users_id' => $post['user_id'] , 'medias_id' => $post['medias_id'] ])->first();

        /* If Media Like Found For Provided User, Delete Record */
        if(! empty($like) ){
            $like->delete();
        }

        /* Return Success Status, With Success Message In Data */
        return [    
            'status' => true,
            'data'   => [
                'message' => 'Media Like Deleted Successfully.'
            ]
        ];
    }

    /* Generate Error Message With provided "status", "code" and "message" */
    public static function generateErrorMessage($status, $code, $message){

        $response = [];
        /* If Code == null */
        if( $code ){
            $response = [
                'data' => [
                    'error'     => $code,
                    'message'   => $message,
                ],
                'status'    => $status
            ];
        }else{
            $response = [
                'data' => [
                    'message'   => $message,
                ],
                'status'    => $status
            ];
        }

        return $response;
    }
}
