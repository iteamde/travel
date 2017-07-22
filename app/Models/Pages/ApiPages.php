<?php

namespace App\Models\Pages;

use App\Models\Pages\Pages;
use App\Models\User\ApiUser as User;
use App\Models\Access\language\Languages;
use App\Models\PagesCategories\PagesCategories;
use App\Models\Pages\PagesTranslations;
use App\Models\Pages\PagesAdmins;
use App\Models\System\Session;

class ApiPages extends Pages
{

    /* Create Page Function */
    public static function create($request){

        /* Get Input Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if( !isset($post['user_id']) || empty($post['user_id']) ){
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not Numeric, Return Error */
        if(! is_numeric( $post['user_id'] ) ){
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.'); 
        }

        /* Find User For The Provided User Id */
        $user = User::where(['id' => $post['user_id'] ])->first();

        /* If User Not Found, Return Error */
        if( empty($user) ){
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Set, Or Is Empty, Return Error */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token'] ])->first();

        /* If Session Not Found, Return Error */
        if( empty($session) ){
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Languages Id Not Provided, Or Is Empty, Return Error */
        if( !isset($post['language_id']) || empty($post['language_id']) ){
            return Self::generateErrorMessage(false, 400, 'Language id not provided.');
        }

        /* If Languages Id Is Not An Integer, Return Error */
        if( !is_numeric($post['language_id']) ){
            return Self::generateErrorMessage(false, 400, 'Language id should be an integer.');
        }

        /* Find Language For The Provided Language Id */
        $language = Languages::where(['id' => $post['language_id'] ])->first();

        /* If Languages Not Found, Return Error */
        if( empty($language) ){
            return Self::generateErrorMessage(false, 400, 'Wrong language id provided.');
        }

        /* If Name Not Set Or Is Empty, Return Error */
        if( !isset($post['name']) || empty($post['name']) ){
            return Self::generateErrorMessage(false, 400, 'Name not provided.');
        }

        /* If Length Of Name Is greater Than, Return Error */
        if( strlen($post['name']) > 30){
            return Self::generateErrorMessage(false, 400, 'Name can only be of < 30 characters.');
        }

        /* If Description Is Not Set Or Is Empty, Return Error */
        if( !isset($post['description']) || empty($post['description']) ){
            return Self::generateErrorMessage(false, 400, 'Description not provided.');
        }

        /* If Category Id Is Not Set Or Is Empty, Return Error */
        if(!isset($post['category_id']) || empty($post['category_id'])){
            return Self::generateErrorMessage(false, 400, 'Category id not provided.');
        }

        /* If Category Id Is Not An Integer, Return Error */
        if(! is_numeric($post['category_id']) ){
            return Self::generateErrorMessage(false, 400, 'Category id should be an integer.');
        }

        /* Find Category For The Provided Page Category Id */
        $category = PagesCategories::where(['id' => $post['category_id']])->first();

        /* If Category Not Found, Return Error */
        if(empty($category)){
            return Self::generateErrorMessage(false, 400, 'Wrong category id provided.');
        }   

        /* Create New Page */
        $page = new Self;
        $page->url = 'temp_url';
        $page->active = Self::STATUS_ACTIVE;
        $page->save();
        
        /* Create New Page Translation */
        $page_trans = new PagesTranslations; 
        $page_trans->title = $post['name'];
        $page_trans->description = $post['description'];
        $page_trans->pages_id = $page->id;
        $page_trans->languages_id = $post['language_id'];
        $page_trans->save();

        /* Create New Page Admin */
        $page_admin = new PagesAdmins;
        $page_admin->pages_id = $page->id;
        $page_admin->users_id = $post['user_id'];
        $page_admin->save();

        /* Return True Status, And Return Success Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'Page created successfully.'
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
