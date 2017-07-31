<?php

namespace App\Models\ActivityMedia;

use App\Models\ActivityMedia\Media;
use App\Models\ActivityMedia\MediaTranslations;
use App\Models\User\ApiUser as User;
use App\Models\User\UsersFriends;
use App\Models\System\Session;
use App\Models\User\UsersMedias;
use App\Models\ActivityMedia\MediasComments;
use App\Models\ActivityMedia\MediasLikes;
use App\Models\ActivityMedia\MediasShares;
use App\Models\ActivityMedia\MediasHides;
use App\Models\ActivityMedia\MediasReports;
use App\Models\Access\language\Languages;

/* For Generating Url */
use App\Helpers\UrlGenerator;

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

        $media_path = 'medias/users/' . $post['user_id'];
        /* New Url Of Uploaded Image */
        $media_url = UrlGenerator::GetUploadsUrl() .  $media_path . '/' . $new_file_name;
        // $media_url = asset('/storage' . $media_path . '/' . $new_file_name);

        $media->url = $media_url;
        $media->save();

        $media_translation->medias_id = $media->id; 

        /* If Description Of Media Is Set, Save It */
        if( isset($post['media_description']) && !empty($post['media_description']) ){
            $media_translation->description = $post['media_description']; 
        }else{
            $media_description->description = 'No description provided.';
        }
        
        $media_translation->languages_id = $post['language_id'];

        /* Save Updated Image Name In User's Table */
        $media_translation->title = $new_file_name;
        $media_translation->save(); 
        
        $user_media->users_id  = $user->id;
        $user_media->medias_id = $media->id;
        $user_media->save();

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

    /* Share Media Function */
    public static function share($request){

        /* Get Post Array For Arguments Sent In Request */
        $post = $request->input();

        /* If User Id Not Set, Or Is Empty, Return Error */
        if( ! isset($post['user_id']) || empty($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User If Is Not An Integer, Return Error */
        if(! is_numeric($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id'] ])->first();

        /* If User Not Found For The Provided User Id, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Is Not Set, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where([ 'id' => $post['session_token'] ])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if( $session->user_id != $post['user_id'] ){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Medias Id Not Set Or Is Empty, return Error */
        if( !isset($post['medias_id']) || empty($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias id not provided.');
        }

        /* If Media Id Is Not An Integer, Return Error */
        if(! is_numeric($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias id should be an integer.');
        }

        /* Find Media For The Provided Media Id */
        $media = Self::where(['id' => $post['medias_id'] ])->first();
            
        /* If Media Not Found, Return Error */
        if( empty($media) ){
            return Self::generateErrorMessage(false, 400, 'Wrong media id provided.');
        }

        /* Create New MediaShare Object */
        $share = new MediasShares;

        /* Load Information In Media Share Object*/
        $share->users_id  = $post['user_id'];
        $share->medias_id = $post['medias_id'];
        $share->scope     = 0;
        $share->save();

        /* Return Status True, With Success Message */
        return [
            'status' => false,
            'data' => [
                'message' => 'Media shared successfully.'
            ]
        ];
    }

    /* Media Deleted Successfully */
    public static function delete_media($request){

        /* Get Post Arguments From Request */
        $post = $request->input();

        /* If User Id Not Set Or Is Empty, Return Error */
        if( !isset($post['user_id']) || empty($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if( ! is_numeric($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User id should be am integer.');
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id'] ])->first();

        /* If User Not Found, Return Error */
        if( empty($user) ){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Is Not Set, Or Is Empty, Return Error */
        if(! isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token'] ])->first();

        /* If Session Not Found, Return Error */
        if( empty($session) ){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if( $session->user_id != $post['user_id'] ){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Medias Id Is Not Set Or Is Empty, Return Error */
        if( !isset($post['medias_id']) || empty($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias id not provided.');
        }

        /* if Medias Id is Not An Integer, Return Error */
        if( !is_numeric($post['medias_id']) ){  
            return Self::generateErrorMessage(false, 400, 'Medias id should be an integer.');
        }

        /* Find Media For The Provided Medias Id */
        $media = Self::where([ 'id' => $post['medias_id'] ])->first();

        /* Id Media Not Found, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong medias id provided.');
        }

        /* Find Relation For User Media */
        $user_media = UsersMedias::where([ 'users_id' => $post['user_id'], 'medias_id' => $post['medias_id'] ])->first();
        
        /* If Relation Not Found, Return Access Permission Error */
        if(empty($user_media)){
            return Self::generateErrorMessage(false, 400, 'You don\'t have permission to perform this action.');
        }

        /* Delete Relation And Media */
        $user_media->delete();
        $media->delete();

        /* Return Success Status, And Success Message */
        return [
            'status' => true,
            'data'   => [
                'message' => 'Media Deleted Successfully.'
            ] 
        ];
    }

    /* Hide Media Function */
    public static function hide($request){

        /* Get Input Arguments For Post Request */
        $post = $request->input();

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if( !isset($post['user_id']) || empty($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not Numeric, Or Is Empty, Return Error */
        if( !is_numeric($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id'] ])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Provided, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For The Provided Session Id */
        $session = Session::where(['id' => $post['session_token'] ])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if( $session->user_id != $post['user_id'] ){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Medias Id Is Not Set, Or Is Empty, Return Error */
        if(! isset($post['medias_id']) || empty($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias id not provided.');
        }

        /* If Medias Id Is Not An Integer, Return Error */
        if(! is_numeric($post['medias_id'])){
            return Self::generateErrorMessage(false, 400, 'Medias id should be an integer.');
        }

        /* Find Media For The Provided Media Id */
        $media = Self::where(['id' => $post['medias_id']])->first();

        /* If Media Not Found, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong media id provided.');
        }

        /* Find Previous Entry For Provided User Id And Media Id. */
        $media_hide = MediasHides::where(['users_id' => $post['user_id'], 'medias_id' => $post['medias_id'] ])->first();

        /* If Previous Entry Not Found, Create New Entry */
        if(empty($media_hide)){
            $media_hide = new MediasHides;

            /* Load Data In MediasHides Model */
            $media_hide->users_id   = $post['user_id'];
            $media_hide->medias_id  = $post['medias_id'];

            /* Save MediasHides */
            $media_hide->save();
        }

        /* Return Status True, And Success Message */
        return [
            'status' => true,
            'data'   => [
                'message' => 'Media hidden successfully'
            ]
        ];
    }

    /* Media Report Function */
    public static function report($request){

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set, Or Is Empty, Return Error */
        if(!isset($post['user_id']) || empty($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find user For Provided User Id */
        $user = User::where(['id' => $post['user_id'] ])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Set, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For Provided Session Id */
        $session = Session::where([ 'id' =>$post['session_token'] ])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if($session->user_id != $post['user_id']){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Medias Id Not Set, Or Is Empty, Return Error */
        if(! isset($post['medias_id']) || empty($post['medias_id'])){
            return Self::generateErrorMessage(false, 400, 'Medias id not provided.');
        }

        /* If Medias Id Is Not An Integer, Return Error */
        if(! is_numeric($post['medias_id'])){
            return Self::generateErrorMessage(false, 400, 'Medias id should ne an integer.');
        }

        /* Find Media For The Provided Media Id */
        $media = Self::where(['id' => $post['medias_id']])->first();

        /* If Media Not Found, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong medias id provided.');
        }

        /* If Reason For Reporting Not Set, Or is Empty, Return Error */
        if(! isset($post['reason']) || empty($post['reason']) ){
            return Self::generateErrorMessage(false, 400, 'Reason not provided.');
        }

        /* If Reason For Reporting Is Not An Integer, Return Error */
        if(! is_numeric($post['reason'])){
            return Self::generateErrorMessage(false, 400, 'Reason should be an integer.');
        }

        /* If Provided User Already Reported This Media, Find The Record */
        $media_report = MediasReports::where(['medias_id' => $post['medias_id'], 'users_id' => $post['user_id']])->first();

        /* If Previous Record Of Reporting Not Found, Create New Record */
        if( empty($media_report) ){
            $media_report = new MediasReports;

            /* Load Information In MediasReports Model */
            $media_report->reason    = $post['reason'];
            $media_report->medias_id = $post['medias_id'];
            $media_report->users_id  = $post['user_id'];
            
            /* Save MediasReports Model */
            $media_report->save();
        }

        /* Return Success Status, Along With Success Message */
        return [
            'status' => true,
            'data'   => [
                'message' => 'Media reported successfully'
            ]
        ]; 
    }

    /* Display Media Information Function */
    public static function activity($request){

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Not Provided, Or Is Empty, Return Error */
        if(!isset($post['user_id']) || empty($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* if User Id Is Not An Integer, Return Error */
        if(! is_numeric($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = User::where([ 'id' => $post['user_id'] ])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Provided, or Is Empty, Return Error */
        if(! isset($post['session_token']) || empty($post['session_token'])){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token'] ])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if($session->user_id != $post['user_id']){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Medias id Not provided, Or Is Empty, Return Error */
        if(! isset($post['medias_id']) || empty($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias id not provided.');
        }

        /* If Medias Id Is Not An Integer, Return Error */
        if(!is_numeric($post['medias_id'])){
            return Self::generateErrorMessage(false, 400, 'Medias id should be an integer.');
        }

        /* Find Media For The Provided Media Id */
        $media = Self::where(['id' => $post['medias_id'] ])->first();

        /* If Media Not Found, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong medias id provided.');
        }

        /* Container For Array Format Response Of Media's Likes */
        $medias_likes_arr = [];

        /* If Media Has Likes, Get Array Format Of Likes Information */
        if(!empty($media->likes)){
            
            foreach ($media->likes as $key => $value) {
                # code...
                array_push($medias_likes_arr,[
                    'user_id' => $value->users_id,
                    'media_id' => $value->medias_id,
                    'created_at' => $value->created_at
                ]);
            }
        }

        /* Container For Media Comments Information */
        $medias_comments_arr = [];

        /* If Media has Comments, Get Array Format Of Comments Information */
        if(!empty($media->comments)){
            foreach ($media->comments as $key => $value) {
                # code...
                array_push($medias_comments_arr,[
                    'user_id' => $value->users_id,
                    'media_id' => $value->medias_id,
                    'comment'  => $value->comment,
                    'reply_to' => $value->reply_to,
                    'created_at' => $value->created_at
                ]);
            }
        }

        /* Return Status True, Along With Success Message */
        return [
            'status' => true,
            'data'   => [
                'medias_likes' => $medias_likes_arr,
                'medias_comments' => $medias_comments_arr
            ]
        ];
    }

    /* Update Medias Description Api */
    public static function update_description($request){

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if(! isset($post['user_id']) || empty($post['user_id'])){
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }   

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id'] ])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Set, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $post['session_token'] ])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if($session->user_id != $post['user_id']){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Medias Id Is Not Set, Or Is Empty, Return Error */
        if(!isset($post['medias_id']) || empty($post['medias_id'])){
            return Self::generateErrorMessage(false, 400, 'Medias id not provided.');
        }

        /* If Medias Id Is Not An Integer, Return Error */
        if(! is_numeric($post['medias_id']) ){
            return Self::generateErrorMessage(false, 400, 'Medias id should be an integer.');
        }

        /* Find Media For Provided Medias Id */
        $media = Self::where(['id' => $post['medias_id']])->first();

        /* If Media Not Found, Return Error */
        if(empty($media)){
            return Self::generateErrorMessage(false, 400, 'Wrong media id provided.');
        }

        /* If Description Not Set, Or Is Empty, Return Error */
        if(!isset($post['description']) || empty($post['description'])){
            return Self::generateErrorMessage(false, 400, 'Description not provided.');
        }

        // Need Language Id To Decide Which Description To Update, For Not English Is Being Updated

        /* Find Translation Model For Medias With Provided Language Id And Medias id */
        $media_trans = MediaTranslations::where(['languages_id' => 1, 'medias_id' => $post['medias_id'] ])->first();   

        /* If Translation Model Not Found,  */
        if(!empty($media_trans)){
            $media_trans->description = $post['description'];
            $media_trans->save();
        }else{
            //Create New Model If Required
        }

        /* Return Success Status, Along With Success Message */
        return [
            'status' => true,
            'data'   => [
                'message' => 'Description of media updated successfully'
            ]
        ];
    }

    /* Get List Of User's Media Group By Languages */
    public static function get_list_by_user( $user_id, $session_token, $media_user_id ){

        /* If User Id Is Not An Integer, Return Error */
        if(!is_numeric($user_id)){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if(empty($user)){   
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* FInd Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token ])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }   

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if($session->user_id != $user_id){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Medias User Id Is Not An Integer, Return Error */
        if(!is_numeric($media_user_id)){
            return Self::generateErrorMessage(false, 400, 'Media user id should be an integer.');
        }

        /* Find User For The Provided Medias User Id */
        $media_user = User::where(['id' => $media_user_id])->first();

        /* If User Not Found For The Provided Medias User Id, Return Error */
        if(empty($media_user)){
            return Self::generateErrorMessage(false, 400, 'Wrong media user id provided.');
        }

        /* Container To Hold The List Of Medias Of Provided User In Array Format */
        $medias_arr = [];

        /* Find All Languages In The System */
        $languages = Languages::all();
        
        /* if Media User Has Medias, Get Array Response */
        if(!empty($media_user->my_medias)){
            /* For Each Media, Get Its Translation And Group By The Languages Ids */
            foreach ($media_user->my_medias as $key => $value) {
                $media = $value->media;
                if(!empty($media)){
                    $trans_temp_arr = [];
                    if(!empty($languages)){
                        foreach ($languages as $key_language => $value_language) {
                            # code...
                            $temp_trans = MediaTranslations::where(['medias_id' => $media->id, 'languages_id' => $value_language->id])->first();

                            if(!empty($temp_trans)){
                                $trans_temp_arr[$value_language->id] = [
                                    'title' => $temp_trans->title,
                                    'description' => $temp_trans->description
                                ];
                            }
                        }
                    }
                    /* 
                    * Push Medias Information ALong With All Available Translations Found For This Media In "medias_arr" 
                    */
                    array_push($medias_arr,[
                        'id' => $media->id,
                        'url' => $media->url,
                        'translations' => $trans_temp_arr
                    ]);
                }
            }
        }
        
        /* Return Success Status, ALong With Medias Array */
        return [
            'status' => true,
            'data' => [
                'medias' => $medias_arr
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
