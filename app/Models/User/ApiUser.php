<?php

/* Folder Location */
namespace App\Models\User;

/* Dependencies */
use App\Models\System\Session;
use App\Models\User\Activation;

/**
 * Class ApiUser.
 */
class ApiUser extends User
{
    /*
    *   Api Level Functionality Will Be Defined In This Class For Users
    */

    /* Validate Arguments Passed From End Point */
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

        /* Check If User Exists For The "username" */
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
       
        /* Check Length Of Name Argument And Ensure It Is Between ( 8 - 32 ) characters */
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

        /* Check If Provided Email Argument Is In Email Format */
        if( ! filter_var( $post['email'], FILTER_VALIDATE_EMAIL ) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => "'".$post['email']."' is not a valid email address.",
                ],
                'status'    => false
            ];
        }

        /* Check If User For Provided Email Exists */
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

        /* Check If Provided Password Length Is Between ( 6-20 ) characters */
        if( strlen($post['password']) < 6 || strlen($post['password']) > 20 ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Length of password should be between (6-20) characters.',
                ],
                'status'    => false
            ];
        }

        /* Check If Provided Password Matches The Required Format */
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

        /* Check If Confirm Password Length Is Between ( 6-20 ) characters */
        if( strlen($post['password_confirmation']) < 6 || strlen($post['password_confirmation']) > 20 ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Length of confirm password should be between (6-20) characters.',
                ],
                'status'    => false
            ];
        }

        /* Check If Password Confirmation Matches The Required Format */
        if( ! preg_match( '/^[a-zA-Z0-9._]+$/' , $post['password_confirmation']) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Confirm password can only contain alphanumeric characters.',
                ],
                'status'    => false
            ];
        }

        /* Check If "Password Confirmation" matches "Password" Argument */
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

        /* New Api User */
        $model = new Self;

        /* Load Values In Model */
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
            
            $activation_model = new Activation;
            $activation_model->user_id  = $model->id;
            $activation_model->token    = Self::generateRandomString(10) . time() . Self::generateRandomString(12);
            $activation_model->save();

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
        
        /* Check If Provided Email Matches The Email Format */
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

        /* Check If Provided Password Length Is Between ( 6-20 ) */
        if( strlen($post['password']) < 6 || strlen($post['password']) > 20 ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Length of password should be between (6-20) characters.',
                ],
                'status'    => false
            ];
        }

        /* Check If Password Matches The Required Format */
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

        /* Find User For Provided Email */
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

        /* Hash The Provided Password */
        $password_hash = sha1($post['password']);

        /* If Password Doesn't Matches the Password For This User. Return Error */
        if( $password_hash != $model->password ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Email or password wrong.',
                ],
                'status'    => false
            ];
        }
        
        /* Find Session For The Provided User */
        $session = Session::where([ 'user_id' => $model->id ])->first();
        
        /* If Session Not Found Create New Session */
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

        /* If Session Found, Return Session Token And User Information, with True Status */
        return [
            'data' => [
                'user' => $model->getArrayResponse(),
                'session_token' => $session->id,
            ],
            'status'    => true
        ];
    }

    public static function logout($post){

        /* Email Validation */
        if( !isset($post['email']) || empty($post['email']) ){
            return Self::generateErrorMessage(false, 400, 'Email not provided.');
        }

        /* Find User With The Provided Email */
        $model = User::where(['email' => $post['email']])->first();
        
        /* if User Not Found, Return Error */
        if(empty($model)){
            return Self::generateErrorMessage(false, 400, 'Wrong Email Provided.');
        }

        /* Session Token Validation */
        if( !isset($post['session_token']) || empty($post['session_token']) ){
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, return Error */
        if( empty($session) ){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User and Provided User Are Not Same, Return Error */
        if( $session->user_id != $model->id ){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Or Email Provided.');
        }

        /* If Session Is For The Provided User, Delete The User Session */
        if($session->delete()){
            return Self::generateErrorMessage(true, null , 'Session Removed Successfully.');
        }else{
            return Self::generateErrorMessage(false, 400, 'Error Removing Session.');
        }
    }

    /* Send password reset request */
    public static function forgotPassword($post){
        
        $model = Self::where([ 'email' => $post['email'] ])->first();

        if(empty($model)){
            return Self::generateErrorMessage(false, 400, 'Email Doesn\'t Exists.');
        }

        $password_reset_token = Self::generateRandomString(20) . time() . Self::generateRandomString(20);

        $model->password_reset_token = $password_reset_token;
        $model->save();
        $model->sendPasswordResetEmail();
        
        return [
            'data' => [
            ],
            'status' => true
        ];
    }

    /* Change Password Of Provided "$token" with "$new_password" after matching with "$confirm_password" and validating */
    public static function changePassword($token, $new_password, $confirm_password){
    
        $user = User::where([ 'password_reset_token' => $token ])->first();
        
        /* If User Not Found For Provided Password Reset Token, Send Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong Password Reset Token');
        }

        /* Password Validation */
        if($new_password != $confirm_password){
            return Self::generateErrorMessage(false, 400, 'New Password And Confirm Password Do not Match');
        }

        /* Check Length of New Password Is Between (6-20) Characters */
        if( strlen($new_password) < 6 || strlen($new_password) > 20 ){
            return Self::generateErrorMessage(false, 400, 'New Password Length Should Be Between (6-20) characters');
        }

        /* Check If Provided Password Matches The Required Format */
        if( ! preg_match( '/^[a-zA-Z0-9._]+$/' , $new_password ) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Password can only contain alphanumeric characters.',
                ],
                'status'    => false
            ];
        }        

        /* Hash New Password Using Sha1 Encryption */
        $password_hash = sha1($new_password);
        $user->password = $password_hash;
        
        if($user->save()){
            /* If Password Changes Successfully, Reset "password_reset_token" field */
            $user->password_reset_token = null;
            $user->save();
        }

        return [
            'status'  => true,
            'data'    => []
        ];
    }

    /* Activate The User For Which The Token Is Provided */
    public static function activate($token){

        $activation_model = Activation::where(['token' => $token])->first();

        /* If No Activation Record Found For Provided Token, Return Error */
        if(empty($activation_model)){
            return Self::generateErrorMessage(false, 400, 'Wrong Token Provided.');
        }

        /* if Associated User Exists For Current Token */
        if( isset($activation_model->user) && !empty($activation_model->user) ){

            /* Get Associated User Record */
            $user = $activation_model->user;

            if($user->status == Self::STATUS_INACTIVE){
                /* Activate User And Save */
                $user->status = Self::STATUS_ACTIVE;
                $user->save();
            }
            
            return [
                'status' => true,
                'data' => []
            ];
        }
    }

    /* Get Users Information, Only After Match Session User and Provided User Id */
    public static function information($user_id, $session_token){
        
        /* Check If Id Is A Valid Integer */
        if(! is_numeric( $user_id ) ){
            return Self::generateErrorMessage( false, 400, 'User Id Should Be An Integer.');
        }
        
        /* Find User For Provided "user_id" */
        $user = Self::where([ 'id' => $user_id ])->first();

        /* If No User Found For The Provided Id, Return Error */
        if( empty( $user ) ){
            return Self::generateErrorMessage( false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided "session_token" */
        $session = Session::where(['id' => $session_token])->first();

        /* If No Session Found For The Provided Session, Return Error */
        if( empty( $session ) ){
            return Self::generateErrorMessage( false, 400, 'Wrong Session Token Provided.' );
        }

        /* If Session's User Id Doesn't Matches The Provided User Id, Return Authentication Error */
        if( $session->user_id != $user_id ){
            return Self::generateErrorMessage( false, 400, 'Cannot Authenticate User.' );
        }

        // $json_info = json_encode($user->getArrayResponse());

        /* Return Success Status, And Users Information On Success */ 
        return [
            'status' => true,
            'data' => [
                'user_info' => $user->getArrayResponse(),
            ]
        ];    
    }

    /*  */
    public static function update_fullname($user_id, $session_token, $fullname){

        /* If User Id Is Not An Integer, Return Error. */
        if(! is_numeric($user_id)){
            return Self::generateErrorMessage( false, 400, 'User Id Must Be An Integer.');
        }

        /* Find User With The Provided User Id. */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found With The Id, Return Error. */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches The Provided User Id, Return Error */
        if($session->user_id != $user_id){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Fullname validation */

        /* If Length Of Fullname Is Not Between (8-32) Characters, Return Error. */
        if(strlen($fullname) < 8 || strlen($fullname) > 32){
            return Self::generateErrorMessage(false, 400, 'Fullname length should be between (8-32) characters.');
        }

        /* Check If Provided Fullname Matches The Required Format */
        if( ! preg_match( '/^[a-zA-Z0-9._ ]+$/' , $fullname ) ){
            return [
                'data' => [
                    'error'     => 400,
                    'message'   => 'Fullname can only contain alphanumeric characters (A-Z,a-z,0-9,\' \',\'.\',\'_\').',
                ],
                'status'    => false
            ];
        }

        $user->name = $fullname;

        $user->save();

        return [
            'status' => true,
            'data' => [
                'user_info' => $user->getArrayResponse()
            ]
        ];
    }

    public static function update_mobile($user_id, $session_token, $mobile){

        /* If User Id Is Not An Integer, Return Error */
        if( ! is_numeric($user_id) ){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For Provided user Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found For Provided User Id, Return Error */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found For Provided Session Token, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id And Provided User Id Don't Match, Return Error */
        if($session->user_id != $user->id){
            return Self::generateErrorMessage(false,400,'Wrong User Id Provided.');
        }

        /* If Mobile Number Field Is Empty, Return Error */
        if(empty($mobile)){
            return Self::generateErrorMessage(false, 400, 'Mobile Number Not Provided.');
        }
        
        /* If Mobile Number Doesn't Matches The Required Format, Return Error */
        if(! preg_match( '/^[+][0-9 -]+$/' , $mobile )){
            return Self::generateErrorMessage(false, 400, 'Invalid Mobile Number Format. Please Provide A Valid Mobile Number Format. E.g,(+000 00000000)');
        }

        $user->mobile = $mobile;

        $user->save();

        return [
            'status' => true,
            'data' => [
                'user_info' => $user->getArrayResponse()
            ]
        ];
    }

    /* Update Address Of Provided User */
    public static function update_address($user_id, $session_token, $address){

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($user_id) ){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If No User Found For The Provided User Id, Return Error  */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If No Session Found For Provided Session Token, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* Match Session's User Id With Provided Id. If Donot Match, Return Error */
        if($session->user_id != $user_id){  
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Update Address Of User And Save */
        $user->address = $address;

        $user->save();

        /* Return Success Status And Updated User Information */
        return [
            'status' => true,
            'data' => [
                'user_info' => $user->getArrayResponse()
            ],
        ];
    }

    public static function update_age($user_id, $session_token, $age){

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($user_id) ){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If No User Found For The Provided User Id, Return Error  */
        if(empty($user)){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If No Session Found For Provided Session Token, Return Error */
        if(empty($session)){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* Match Session's User Id With Provided Id. If Donot Match, Return Error */
        if($session->user_id != $user_id){  
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Age Is Not A Valid Number, Return Error */
        if(! is_numeric( $age ) ){
            return Self::generateErrorMessage(false, 400, 'Invalid Age.');
        }

        if( $age < 0 ){
            return Self::generateErrorMessage(false, 400, 'Invalid Age.');
        }

        /* Update Age Of User And Save */
        $user->age = $age;

        $user->save();

        /* Return Success Status And Updated User Information */
        return [
            'status' => true,
            'data' => [
                'user_info' => $user->getArrayResponse()
            ],
        ];
    }

    public static function update_nationality($user_id, $session_token, $nationality){

        /* If User Id Is Not An Integer, Return Error */
        if(! is_numeric($user_id) ){
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.' );
        }
        
        /* Find User For The Provided User Id */
        $user = Self::where([ 'id' => $user_id ])->first();
        
        /* If User Not Found, Return Error */
        if( empty( $user ) ){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if( empty( $session ) ){
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if( $session->user_id != $user_id ){
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Nationality Is Not Provided, Or Empty, Return Error */
        if( empty( $nationality ) ){
            return Self::generateErrorMessage(false, 400, 'Nationality Not Provided.');
        }

        /* Update User's Nationality And Save */
        $user->nationality = $nationality;
        $user->save();

        /* Return Success Status And User Information */
        return [
            'status' => true,
            'data' => [
                'user_info' => $user->getArrayResponse()
            ]
        ];        
    }

    /* Return User Information In Array Format */
    public function getArrayResponse(){

        return [
            'id'            => $this->id,
            'username'      => $this->username,
            'name'          => $this->name,
            'email'         => $this->email,
            'status'        => $this->status,
            'mobile_number' => $this->mobile,
            'address'       => $this->address,
            'age'           => $this->age,
            'nationality'   => $this->nationality
        ];
    }
    
    /* Send Activation Email To User's Email Address */
    public function sendActivationMessage(){
        

    //     header('Access-Control-Allow-Origin: *');
    //     //if you need cookies or login etc
    //     header('Access-Control-Allow-Credentials: true');
    //     header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    //     header('Access-Control-Max-Age: 604800');
    //       //if you need special headers
    //     header('Access-Control-Allow-Headers: x-requested-with');

    //     $to = 'farzam.moeen@granjur.net';
    //     $subject = 'Hello World';
    //     $message = 'Hello World';
    //     $headers = 'From: travoo@abcd.com' . '\r\n' .
    // 'CC: travoo-test@abcd.com';

    //     $mail_status = mail($to,$subject,$message,$headers);

        // the message
        // $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        // $msg = wordwrap($msg,70);

        // send email
        // $mail_status = mail("farzammoeen007@gmail.com","My subject",$msg);

        // echo '<pre>';
        // print_r($mail_status);
        // exit;
    }

    /* Send Mail To Reset Password With Reset Token */
    public function sendPasswordResetEmail(){

    }

    /* Generate Random String of "length" = 63 */
    public static function generateRandomString($length = 63) {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString;
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
