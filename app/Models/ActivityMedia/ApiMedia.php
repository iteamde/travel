<?php

namespace App\Models\ActivityMedia;

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Models\User\ApiUser as User;
use App\Models\System\Session;
use App\Models\User\UsersMedias;

class ApiMedia extends Media
{
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
