<?php

namespace App\Models\User;

use App\Models\System\Session;

/**
 * Class ApiUser.
 */
class ApiUser extends User
{
    /*
    *   Api Level Functionality Will Be Defined Here
    */

    public static function validateInputParams($post){
        
        /* "username" validation */
        if(!isset($post['username']) || empty($post['username'])){
            // \App::abort(400 , 'Username cannot be empty');
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Username not provided.',
                ],
                'status'    => false
            ];
        }

        $user = Self::where(['username' => $post['username']])->first();

        if( !empty($user) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Username already taken.',
                ],
                'status'    => false
            ];
        }

        /* "name" validation */
        if( !isset($post['name']) || empty($post['name'])   ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Name not provided.',
                ],
                'status'    => false
            ];
        }
       
        if( strlen($post['name']) < 8 || strlen($post['name']) > 32 ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Length of name should be between (8-32) characters.',
                ],
                'status'    => false
            ];
        }

        if( ! preg_match( '/^[a-zA-Z0-9._]+$/' , $post['name']) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Name can only contain alphanumeric characters.',
                ],
                'status'    => false
            ];
        }

        /* "gender" validation */
        if( !isset($post['gender']) || empty($post['gender'])   ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Gender not provided.',
                ],
                'status'    => false
            ];
        }

        /* "email" validation */
        if( !isset($post['email']) || empty($post['email'])   ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Email not provided.',
                ],
                'status'    => false
            ];
        }

        if( ! filter_var( $post['email'], FILTER_VALIDATE_EMAIL ) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => "'".$post['email']."' is not a valid email address.",
                ],
                'status'    => false
            ];
        }

        $model = Self::where(['email' => $post['email']])->first();

        if(!empty($model)){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Email already taken.',
                ],
                'status'    => false
            ];
        }

        /* "password" validation */
        if( !isset($post['password']) || empty($post['password'])   ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Password not provided.',
                ],
                'status'    => false
            ];
        }

        if( strlen($post['password']) < 6 || strlen($post['password']) > 20 ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Length of password should be between (6-20) characters.',
                ],
                'status'    => false
            ];
        }

        if( ! preg_match( '/^[a-zA-Z0-9._]+$/' , $post['password']) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Password can only contain alphanumeric characters.',
                ],
                'status'    => false
            ];
        }

        /* "password_confirmation" validation */
        if( !isset($post['password_confirmation']) || empty($post['password_confirmation'])   ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Confirm password not provided.',
                ],
                'status'    => false
            ];
        }

        if( strlen($post['password_confirmation']) < 6 || strlen($post['password_confirmation']) > 20 ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Length of confirm password should be between (6-20) characters.',
                ],
                'status'    => false
            ];
        }

        if( ! preg_match( '/^[a-zA-Z0-9._]+$/' , $post['password_confirmation']) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Confirm password can only contain alphanumeric characters.',
                ],
                'status'    => false
            ];
        }

        if( $post['password_confirmation'] != $post['password'] ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Password and confirm password do not match.',
                ],
                'status'    => false
            ];
        }
    }

    public static function createUser($post){

        $model = new Self;

        $model->name     = $post['name'];
        $model->username = $post['username'];
        $model->email    = $post['email'];
        $model->password = sha1($post['password']);
        $model->gender   = $post['gender'];
        $model->status   = Self::STATUS_INACTIVE;
        
        if( isset( $post['mobile_number'] ) && !empty( $post['mobile_number'] ) ){
            $model->mobile = $post['mobile_number'];
        }

        if($model->save()){
            $model->sendActivationMessage();
            return [
                'status' => true,
                'data'   => $model->getArrayResponse()
            ];
        }
    }

    public static function loginValidation($post){

        /* "email" validation */
        if( !isset($post['email']) || empty($post['email']) ){
            return [
                'status' => false,
                'data' => [
                    'error' => 400,
                    'message' => 'Email not provided.',
                ],
            ];
        }
        
        if( ! filter_var( $post['email'], FILTER_VALIDATE_EMAIL ) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => "'".$post['email']."' is not a valid email address.",
                ],
                'status'    => false
            ];
        }

        /* "password" validation */
        if( !isset($post['password']) || empty($post['password'])   ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Password not provided.',
                ],
                'status'    => false
            ];
        }

        if( strlen($post['password']) < 6 || strlen($post['password']) > 20 ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Length of password should be between (6-20) characters.',
                ],
                'status'    => false
            ];
        }

        if( ! preg_match( '/^[a-zA-Z0-9._]+$/' , $post['password']) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Password can only contain alphanumeric characters.',
                ],
                'status'    => false
            ];
        }
    }

    public static function loginUser($post , $request){

        $model = Self::where(['email' => $post['email']])->first();

        if(empty($model)){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Email or password wrong.',
                ],
                'status'    => false
            ];
        }

        $password_hash = sha1($post['password']);

        if( $password_hash != $model->password ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Email or password wrong.',
                ],
                'status'    => false
            ];
        }
        
        $session = Session::where([ 'user_id' => $model->id ])->first();
        
        if(empty($session)){
            $sessionData = [
                'user_id' => $model->id
            ];
            /* Save User Data To Session */
            session()->put('user' , $model->getArrayResponse());
            session()->save();
            /* Find Last Entered Record In Session Array To Assign User Id */
            $session = Session::orderBy('last_activity', 'desc')->first();
            $session->user_id = $model->id;
            /* Assign 63 character long string to the id of session */
            $session->id = Self::generateRandomString();
            $session->save();
        }

        return [
            'data' => [
                'user' => $model->getArrayResponse(),
                'session_token' => $session->id,
            ],
            'status'    => true
        ];
    }

    public function getArrayResponse(){
        
        return [
            'username'      => $this->username,
            'name'          => $this->name,
            'email'         => $this->email,
            'status'        => $this->status,
            'mobile_number' => $this->mobile
        ];
    }
    
    public function sendActivationMessage(){

    }

   public static function generateRandomString($length = 63) {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString;
    }
}
