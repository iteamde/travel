<?php

/* Folder Location */

namespace App\Models\User;

/* Dependencies */

use App\Models\System\Session;
use App\Models\User\Activation;
use App\Models\User\UsersFriends;
use App\Models\User\UsersBlocks;
use App\Models\User\UsersHiddenContent;
use App\Models\User\UsersPrivacySettings;
use App\Models\User\UsersNotificationSettings;
use App\Models\User\UsersFriendRequests;
use App\Models\User\UsersFavourites;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog\ActivityLog;
use App\Helpers\UrlGenerator;
use App\Models\Country\ApiCountry;

/**
 * Class ApiUser.
 */
class ApiUser extends User {
    /*
     *   Api Level Functionality Will Be Defined In This Class For Users
     */

    /* Validate Arguments Passed From End Point */

    public static function validateInputParams($post) {

        $error = [];

        /* "username" validation */
        if (!isset($post['username']) || empty($post['username'])) {
            // \App::abort(400 , 'Username cannot be empty');
            array_push($error, 'Username not provided.');
        } else {

            /* Check Length Of Name Argument And Ensure It Is Between ( 8 - 32 ) characters */
            if (strlen($post['username']) < 8 || strlen($post['username']) > 32) {
                array_push($error, 'Length of username should be between (8-32) characters.');
            }

            if (!preg_match('/^[a-zA-Z0-9 ]+$/', $post['username'])) {
                array_push($error, 'Name can only contain alphanumeric characters.');
            }

            /* Check If User Exists For The "username" */
            $user = Self::where(['username' => $post['username']])->first();

            if (!empty($user)) {
                array_push($error, 'Username already taken.');
            }
        }

        /* "name" validation */
        if (!isset($post['name']) || empty($post['name'])) {
            array_push($error, 'Name not provided.');
        } else {
            /* Check Length Of Name Argument And Ensure It Is Between ( 8 - 32 ) characters */
            if (strlen($post['name']) < 8 || strlen($post['name']) > 32) {
                array_push($error, 'Length of name should be between (8-32) characters.');
            }

            if (!preg_match('/^[a-zA-Z0-9 ]+$/', $post['name'])) {
                array_push($error, 'Name can only contain alphanumeric characters.');
            }
        }

        /* "gender" validation */
        if (!isset($post['gender']) || ( empty($post['gender']) && $post['gender'] != 0 ) ) {
            array_push($error, 'Gender not provided.');
        } else {
            $message = 'Gender can only contain following values (' . Self::GENDER_MALE . '-Male, ' . Self::GENDER_FEMALE . '-Female, ' . Self::GENDER_UNSPECIFIED . '-Unspecified).';

            /* Check If Provided Gender Is An Integer */
            if (!preg_match('/^[0-9]+$/', $post['gender'])) {

                array_push($error, $message);
            } else {

                if ($post['gender'] != Self::GENDER_MALE && $post['gender'] != Self::GENDER_FEMALE && $post['gender'] != Self::GENDER_UNSPECIFIED) {

                    array_push($error, $message);
                }
            }
        }

        /* "email" validation */
        if (!isset($post['email']) || empty($post['email'])) {
            array_push($error, 'Email not provided.');
        } else {
            /* Check If Provided Email Argument Is In Email Format */
            if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                array_push($error, "'" . $post['email'] . "' is not a valid email address.");
            }

            /* Check If User For Provided Email Exists */
            $model = Self::where(['email' => $post['email']])->first();

            if (!empty($model)) {
                array_push($error, 'Email already taken.');
            }
        }

        /* "password" validation */
        if (!isset($post['password']) || empty($post['password'])) {
            array_push($error, 'Password not provided.');
        } else {
            /* Check If Provided Password Matches The Required Format */
            if (!preg_match('/^[a-zA-Z0-9._]+$/', $post['password'])) {
                array_push($error, 'Password can only contain alphanumeric characters.');
            }
            /* Check If Provided Password Length Is Between ( 6-20 ) characters */
            if (strlen($post['password']) < 6 || strlen($post['password']) > 20) {
                array_push($error, 'Length of password should be between (6-20) characters.');
            }
        }

        /* "password_confirmation" validation */
        if (!isset($post['password_confirmation']) || empty($post['password_confirmation'])) {
            array_push($error, 'Confirm password not provided.');
        } else {

            /* Check If Confirm Password Length Is Between ( 6-20 ) characters */
            if (strlen($post['password_confirmation']) < 6 || strlen($post['password_confirmation']) > 20) {
                array_push($error, 'Length of confirm password should be between (6-20) characters.');
            }

            /* Check If Password Confirmation Matches The Required Format */
            if (!preg_match('/^[a-zA-Z0-9._]+$/', $post['password_confirmation'])) {
                array_push($error, 'Confirm password can only contain alphanumeric characters.');
            }
        }

        if (isset($post['password_confirmation']) && isset($post['password'])) {
            /* Check If "Password Confirmation" matches "Password" Argument */
            if ($post['password_confirmation'] != $post['password']) {
                array_push($error, 'Password and confirm password do not match.');
            }
        }

        /* If Mobile Number Doesn't Matches The Required Format, Return Error */
        if (isset($post['mobile_number'])) {

            if (!preg_match('/^[+][0-9 -]+$/', $post['mobile_number'])) {

                array_push($error, 'Invalid Mobile Number Format. Please Provide A Valid Mobile Number Format. E.g,(+000 00000000)');
            }
        }

        if (empty($error)) {
            return false;
        } else {
            return [
                'data' => [
                    'error' => 400,
                    'message' => $error,
                ],
                'status' => false
            ];
        }
    }

    public static function validateStep1Signup($post){

        $error = [];

        /* "username" validation */
        if (!isset($post['username']) || empty($post['username'])) {
            // \App::abort(400 , 'Username cannot be empty');
            array_push($error, 'Username not provided.');
        } else {

            /* Check Length Of Name Argument And Ensure It Is Between ( 8 - 32 ) characters */
            if (strlen($post['username']) < 8 || strlen($post['username']) > 32) {
                array_push($error, 'Length of username should be between (8-32) characters.');
            }

            if (!preg_match('/^[a-zA-Z0-9 ]+$/', $post['username'])) {
                array_push($error, 'Name can only contain alphanumeric characters.');
            }

            /* Check If User Exists For The "username" */
            $user = Self::where(['username' => $post['username']])->first();

            if (!empty($user)) {
                array_push($error, 'Username already taken.');
            }
        }


        /* "email" validation */
        if (!isset($post['email']) || empty($post['email'])) {
            array_push($error, 'Email not provided.');
        } else {
            /* Check If Provided Email Argument Is In Email Format */
            if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                array_push($error, "'" . $post['email'] . "' is not a valid email address.");
            }

            /* Check If User For Provided Email Exists */
            $model = Self::where(['email' => $post['email']])->first();

            if (!empty($model)) {
                array_push($error, 'Email already taken.');
            }
        }

        /* "password" validation */
        if (!isset($post['password']) || empty($post['password'])) {
            array_push($error, 'Password not provided.');
        } else {
            /* Check If Provided Password Matches The Required Format */
            if (!preg_match('/^[a-zA-Z0-9._]+$/', $post['password'])) {
                array_push($error, 'Password can only contain alphanumeric characters.');
            }
            /* Check If Provided Password Length Is Between ( 6-20 ) characters */
            if (strlen($post['password']) < 6 || strlen($post['password']) > 20) {
                array_push($error, 'Length of password should be between (6-20) characters.');
            }
        }

        /* "password_confirmation" validation */
        if (!isset($post['password_confirmation']) || empty($post['password_confirmation'])) {
            array_push($error, 'Confirm password not provided.');
        } else {

            /* Check If Confirm Password Length Is Between ( 6-20 ) characters */
            if (strlen($post['password_confirmation']) < 6 || strlen($post['password_confirmation']) > 20) {
                array_push($error, 'Length of confirm password should be between (6-20) characters.');
            }

            /* Check If Password Confirmation Matches The Required Format */
            if (!preg_match('/^[a-zA-Z0-9._]+$/', $post['password_confirmation'])) {
                array_push($error, 'Confirm password can only contain alphanumeric characters.');
            }
        }

        if (isset($post['password_confirmation']) && isset($post['password'])) {
            /* Check If "Password Confirmation" matches "Password" Argument */
            if ($post['password_confirmation'] != $post['password']) {
                array_push($error, 'Password and confirm password do not match.');
            }
        }

        if (empty($error)) {
            return false;
        } else {
            return [
                'data' => [
                    'error' => 400,
                    'message' => $error,
                ],
                'success' => false
            ];
        }
    }

    public static function createUserStep1($post){
        
        /* New Api User */
        $model = new Self;                
        
        /* Load Values In Model */
        $model->username = $post['username'];
        $model->email = $post['email'];
        $model->password = sha1($post['password']);
        $model->status = Self::STATUS_INACTIVE;

        if($model->save()){
            return [
                'success' => true,
                'data' => $model->id // RETURN USER ID
            ];
        }else{
            //IF USER NOT SAVED
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Error saving user in DB.',
                ],
                'success' => false
            ];
        }
    }

    public static function validateStep2Signup($post){

        $error = [];

        if(!isset($post['user_id']) || empty($post['user_id'])){
            $error[] = 'User id not provided.';
        }else{
            $user = Self::where(['id' => $post['user_id']])->first();
            if(empty($user)){
                $error[] = 'User not found.';
            }
        }

        /* "name" validation */
        if (!isset($post['name']) || empty($post['name'])) {
            $error[] =  'Name not provided.';
        } else {
            /* Check Length Of Name Argument And Ensure It Is Between ( 8 - 32 ) characters */
            if (strlen($post['name']) < 8 || strlen($post['name']) > 32) {
                $error[] = 'Length of name should be between (8-32) characters.';
            }

            if (!preg_match('/^[a-zA-Z0-9 ]+$/', $post['name'])) {
                $error[] = 'Name can only contain alphanumeric characters.';
            }
        }

        /* "gender" validation */
        if (!isset($post['gender']) || ( empty($post['gender']) && $post['gender'] != 0 ) ) {
            $error[] = 'Gender not provided.';
        } else {
            $message = 'Gender can only contain following values (' . Self::GENDER_MALE . '-Male, ' . Self::GENDER_FEMALE . '-Female, ' . Self::GENDER_UNSPECIFIED . '-Unspecified).';

            /* Check If Provided Gender Is An Integer */
            if (!preg_match('/^[0-9]+$/', $post['gender'])) {

                $error[] = $message;
            } else {

                if ($post['gender'] != Self::GENDER_MALE && $post['gender'] != Self::GENDER_FEMALE && $post['gender'] != Self::GENDER_UNSPECIFIED) {

                    $error[] = $message;
                }
            }
        }

         /* "gender" validation */
        if (!isset($post['age']) ||  empty($post['age'])) {
            $error[] = 'Age not provided.';
        } else {
            /* Check If Provided Age Is An Integer */
            if (!preg_match('/^[0-9]+$/', $post['age'])) {

                $error[] = 'Age must be integer.';
            }
        }

        if(!empty($error)){
            return [
                'success' => false,
                'data'    => $error,
                'code'    => 400
            ];
        }else{
            return false;
        }
    }

    public static function createUserStep2($post){

        $model = Self::where(['id' => $post['user_id']])->first();

        $model->name    = $post['name'];
        $model->gender  = $post['gender'];
        $model->age     = $post['age'];
        $model->status  = Self::STATUS_INACTIVE;

        if($model->save()){
            $activation_model = new Activation;
            $activation_model->user_id = $model->id;
            $activation_model->token = Self::generateRandomString(10) . time() . Self::generateRandomString(12);
            $activation_model->save();

            // $ac = new ActivityLog;
            // $ac->users_id = $model->id;
            // $ac->type = 'registeration';
            // $ac->action = 'new';
            // $ac->time = date('Y-m-d H:i:s', time());
            // $ac->save();

            $model->sendActivationMessage();    

            return [
                'success' => true,
                'data'    => $model->getArrayResponse(),
                'code'    => 200
            ];
        }else{
            return [
                'success' => false,
                'code'    => 400,
                'data'    => 'Error saving data in DB.'
            ];
        }
    }

    public static function validateStep3Signup($post){

        $error = [];

        /* User id not provided */
        if(!isset($post['user_id']) || empty($post['user_id'])){
            $error[] = 'User id not provided.';
        }else{
            $user = Self::where(['id' => $post['user_id']])->first();
            if(empty($user)){
                $error[] = 'Wrong user id provided.';
            }
        }

        if(!isset($post['countries']) || empty($post['countries'])){
            $error[] = 'Countries not provided.';
        }else{
            // $countries = json_decode($post['countries']);

            // if (json_last_error() === JSON_ERROR_NONE) {

            //     if(empty($countries)){
            //         $error[] = 'No country provided in JSON object.';
            //     }else{
                    $countries = $post['countries'];

                    if(!isset($countries[0]['id'])){
                        $error[] = 'Countries id not provided in JSON object.';
                    }else{
                        foreach ($countries as $key => $value) {
                            $country = ApiCountry::where(['id' => $value['id']])->first();
                            if(empty($country)){
                                $error[] = 'Country not found with id "'.$value['id'].'"';
                            }
                        }
                    }
                // }

            // }else{
            //     $error[] = 'Please send valid JSON objects in "countries" key';
            // }
        }

        if(empty($error)){
            return false;
        }else{
            return [
                'success' => false,
                'code'    => 400,
                'data'    => $error 
            ];
        }

    }

    public static function createUserStep3($post){
        
        // $countries = json_decode($post['countries']);

        $countries = $post['countries'];

        foreach ($countries as $key => $value) {
            
            $model = new UsersFavourites;
            $model->users_id = $post['user_id'];
            $model->fav_type = 'country';
            $model->fav_id = $value['id'];
            $model->save();
        }

        return [
            'success' => true,
            'code'    => 200,
            'data'    => [] 
        ];
    }


    public static function validateStep4Signup($post){

        $error = [];

        /* User id not provided */
        if(!isset($post['user_id']) || empty($post['user_id'])){
            $error[] = 'User id not provided.';
        }else{
            $user = User::where(['id' => $post['user_id']])->first();
           
            if(empty($user)){
                $error[] = 'Wrong user id provided.';
            }
        }

        if(!isset($post['places']) || empty($post['places'])){
                $error[] = 'Places not provided.';
        }else{
            $places = $post['places'];

            if(!isset($places[0]['id']) || empty($places[0]['id'])){
                $error[]   = '"id" not provided in places object.';
            }
        }

        if(empty($error)){
            return false;
        }else{
            return [
                'succes' => false,
                'code'   => 200,
                'data'   => $error
            ];
        }
    }

    public static function createUserStep4($post){

        $places = $post['places'];

        foreach ($places as $key => $value) {
            
            $model = new UsersFavourites;
            $model->users_id = $post['user_id'];
            $model->fav_type = 'place';
            $model->fav_id = $value['id'];
            $model->save();
        }

        return [
            'success' => true,
            'code'    => 200,
            'data'    => [] 
        ];
    }

    public static function createUser($post) {

        /* New Api User */
        $model = new Self;

        /* Load Values In Model */
        $model->name = $post['name'];
        $model->username = $post['username'];
        $model->email = $post['email'];
        $model->password = sha1($post['password']);
        $model->gender = $post['gender'];
        $model->status = Self::STATUS_INACTIVE;

        if (isset($post['mobile_number']) && !empty($post['mobile_number'])) {
            $model->mobile = $post['mobile_number'];
        }

        if ($model->save()) {

            $activation_model = new Activation;
            $activation_model->user_id = $model->id;
            $activation_model->token = Self::generateRandomString(10) . time() . Self::generateRandomString(12);
            $activation_model->save();

            // $ac = new ActivityLog;
            // $ac->users_id = $model->id;
            // $ac->type = 'registeration';
            // $ac->action = 'new';
            // $ac->time = date('Y-m-d H:i:s', time());
            // $ac->save();

            $model->sendActivationMessage();
            return [
                'status' => true,
                'data' => $model->getArrayResponse()
            ];
        }
    }

    public static function loginValidation($post) {

        $error = [];

        /* "email" validation */
        if (!isset($post['email']) || empty($post['email'])) {
            array_push($error, 'Email not provided.');
        } else {
            /* Check If Provided Email Matches The Email Format */
            if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                array_push($error, "'" . $post['email'] . "' is not a valid email address.");
            }
        }

        /* "password" validation */
        if (!isset($post['password']) || empty($post['password'])) {
            array_push($error, 'Password not provided.');
        } else {
            /* Check If Provided Password Length Is Between ( 6-20 ) */
            if (strlen($post['password']) < 6 || strlen($post['password']) > 20) {
                array_push($error, 'Password is incorrect.');
            }

            /* Check If Password Matches The Required Format */
            if (!preg_match('/^[a-zA-Z0-9._]+$/', $post['password'])) {
                array_push($error, 'Password can only contain alphanumeric characters.');
            }
        }

        if (!empty($error)) {
            return Self::generateErrorMessage(false, 400, $error);
        }

        return false;
    }

    public static function loginUser($post, $request) {

        /* Find User For Provided Email */
        $model = Self::where(['email' => $post['email']])->first();

        if (empty($model)) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Email or password wrong.',
                ],
                'status' => false
            ];
        }

        /* Hash The Provided Password */
        $password_hash = sha1($post['password']);

        /* If Password Doesn't Matches the Password For This User. Return Error */
        if ($password_hash != $model->password) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Email or password wrong.',
                ],
                'status' => false
            ];
        }

        if ($model->status == Self::STATUS_INACTIVE) {
            return Self::generateErrorMessage(false, 400, 'Account not verified. Please verify your account through the verification email sent to your email id.');
        }

        if ($model->status == Self::STATUS_DEACTIVE) {
            // $model->status = Self::STATUS_ACTIVE;
            // $model->save();
            return Self::generateErrorMessage(false, 400, 'The user is deactivated.');
        }

        /* Find Session For The Provided User */
        $session = Session::where([ 'user_id' => $model->id])->first();

        /* If Session Not Found Create New Session */
        if (empty($session)) {
            $sessionData = [
                'user_id' => $model->id
            ];
            /* Save User Data To Session */
            session()->put('user', $model->getArrayResponse());
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
                'token' => $session->id,
            ],
            'success' => true
        ];
    }

    public static function logout($post) {

        /* Email Validation */
        if (!isset($post['email']) || empty($post['email'])) {
            return Self::generateErrorMessage(false, 400, 'Email not provided.');
        }

        /* Find User With The Provided Email */
        $model = User::where(['email' => $post['email']])->first();

        /* if User Not Found, Return Error */
        if (empty($model)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Email Provided.');
        }

        /* Session Token Validation */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User and Provided User Are Not Same, Return Error */
        if ($session->user_id != $model->id) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Or Email Provided.');
        }

        /* If Session Is For The Provided User, Delete The User Session */
        if ($session->delete()) {
            return Self::generateErrorMessage(true, null, 'Session Removed Successfully.');
        } else {
            return Self::generateErrorMessage(false, 400, 'Error Removing Session.');
        }
    }

    /* Send password reset request */

    public static function forgotPassword($post) {

        if (!isset($post['email']) || empty($post['email'])) {
            return Self::generateErrorMessage(false, 400, 'Email not provided.');
        }

        /* Check If Provided Email Matches The Email Format */
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            return Self::generateErrorMessage(false, 400, "'" . $post['email'] . "' is not a valid email address.");
        }

        $model = Self::where([ 'email' => $post['email']])->first();

        if (empty($model)) {
            return Self::generateErrorMessage(false, 400, 'Email Doesn\'t Exists.');
        }

        $password_reset_token = Self::generateRandomString(20) . time() . Self::generateRandomString(20);

        $model->password_reset_token = $password_reset_token;
        $model->save();
        $model->sendPasswordResetEmail();

        return [
            'data' => [
                'message' => 'An email with password reset link is sent to your email account.'
            ],
            'status' => true
        ];
    }

    /* Change Password Of Provided "$token" with "$new_password" after matching with "$confirm_password" and validating */

    public static function changePassword($token, $new_password, $confirm_password) {

        $user = User::where([ 'password_reset_token' => $token])->first();

        /* If User Not Found For Provided Password Reset Token, Send Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Password Reset Token, Please Send The Password Reset Token You Received In The Email Sent To Your Email Account.');
        }

        /* Password Validation */
        if ($new_password != $confirm_password) {
            return Self::generateErrorMessage(false, 400, 'New Password And Confirm Password Do not Match');
        }

        /* Check Length of New Password Is Between (6-20) Characters */
        if (strlen($new_password) < 6 || strlen($new_password) > 20) {
            return Self::generateErrorMessage(false, 400, 'New Password Length Should Be Between (6-20) characters');
        }

        /* Check If Provided Password Matches The Required Format */
        if (!preg_match('/^[a-zA-Z0-9._]+$/', $new_password)) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Password can only contain alphanumeric characters.',
                ],
                'status' => false
            ];
        }

        /* Hash New Password Using Sha1 Encryption */
        $password_hash = sha1($new_password);

        if ($password_hash == $user->password) {
            return Self::generateErrorMessage(false, 400, 'New password cannot be the same as old password, please enter new password.');
        }

        $user->password = $password_hash;

        if ($user->save()) {
            /* If Password Changes Successfully, Reset "password_reset_token" field */
            $user->password_reset_token = null;
            $user->save();

            $sessions = Session::where([ 'user_id' => $user->id])->get();

            if (!empty($sessions[0])) {
                foreach ($sessions as $key => $value) {
                    $value->id = Self::generateRandomString();
                    $value->save();
                }
            }
        }

        return [
            'status' => true,
            'data' => [
                'message' => 'Password reset successfull.'
            ]
        ];
    }

    /* Activate The User For Which The Token Is Provided */

    public static function activate($token) {

        $activation_model = Activation::where(['token' => $token])->first();

        /* If No Activation Record Found For Provided Token, Return Error */
        if (empty($activation_model)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Token Provided.');
        }

        /* if Associated User Exists For Current Token */
        if (isset($activation_model->user) && !empty($activation_model->user)) {

            /* Get Associated User Record */
            $user = $activation_model->user;

            if ($user->status == Self::STATUS_INACTIVE) {
                /* Activate User And Save */
                $user->status = Self::STATUS_ACTIVE;
                $user->save();
            }

            return [
                'status' => true,
                'data' => [
                    'message' => 'Account Activated Successfully'
                ]
            ];
        }
    }

    /* Get Users Information, Only After Match Session User and Provided User Id */

    public static function information($user_id, $session_token) {

        /* Check If Id Is A Valid Integer */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For Provided "user_id" */
        $user = Self::where([ 'id' => $user_id])->first();

        /* If No User Found For The Provided Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided "session_token" */
        $session = Session::where(['id' => $session_token])->first();

        /* If No Session Found For The Provided Session, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches The Provided User Id, Return Authentication Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Cannot Authenticate User.');
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

    public static function update_fullname($post) {

        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        if (!isset($post['fullname']) || empty($post['fullname'])) {
            return Self::generateErrorMessage(false, 400, 'Fullname Not Provided.');
        }

        $user_id = $post['user_id'];
        $session_token = $post['session_token'];
        $fullname = $post['fullname'];

        /* If User Id Is Not An Integer, Return Error. */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Must Be An Integer.');
        }

        /* Find User With The Provided User Id. */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found With The Id, Return Error. */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches The Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Fullname validation */

        /* If Length Of Fullname Is Not Between (8-32) Characters, Return Error. */
        if (strlen($fullname) < 8 || strlen($fullname) > 32) {
            return Self::generateErrorMessage(false, 400, 'Fullname length should be between (8-32) characters.');
        }

        /* Check If Provided Fullname Matches The Required Format */
        if (!preg_match('/^[a-zA-Z0-9._ ]+$/', $fullname)) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Fullname can only contain alphanumeric characters (A-Z,a-z,0-9,\' \',\'.\',\'_\').',
                ],
                'status' => false
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

    public static function update_mobile($post) {

        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        if (!isset($post['mobile']) || empty($post['mobile'])) {
            return Self::generateErrorMessage(false, 400, 'Mobile Number Not Provided.');
        }

        $user_id = $post['user_id'];
        $session_token = $post['session_token'];
        $mobile = $post['mobile'];

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For Provided user Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found For Provided User Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found For Provided Session Token, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id And Provided User Id Don't Match, Return Error */
        if ($session->user_id != $user->id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Mobile Number Field Is Empty, Return Error */
        if (empty($mobile)) {
            return Self::generateErrorMessage(false, 400, 'Mobile Number Not Provided.');
        }

        if ($mobile[0] != '+') {
            $mobile = '+' . $mobile;
        }

        /* If Mobile Number Doesn't Matches The Required Format, Return Error */
        if (!preg_match('/^[+][0-9 -]+$/', $mobile)) {
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

    public static function update_address($post) {

        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        if (!isset($post['address']) || empty($post['address'])) {
            return Self::generateErrorMessage(false, 400, 'Address Not Provided.');
        }

        $user_id = $post['user_id'];
        $session_token = $post['session_token'];
        $address = $post['address'];

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If No User Found For The Provided User Id, Return Error  */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If No Session Found For Provided Session Token, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* Match Session's User Id With Provided Id. If Donot Match, Return Error */
        if ($session->user_id != $user_id) {
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

    public static function update_age($post) {

        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        if (!isset($post['age']) || empty($post['age'])) {
            return Self::generateErrorMessage(false, 400, 'Age Not Provided.');
        }

        $user_id = $post['user_id'];
        $session_token = $post['session_token'];
        $age = $post['age'];

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If No User Found For The Provided User Id, Return Error  */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If No Session Found For Provided Session Token, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* Match Session's User Id With Provided Id. If Donot Match, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Age Is Not A Valid Number, Return Error */
        if (!is_numeric($age)) {
            return Self::generateErrorMessage(false, 400, 'Invalid Age.');
        }

        if ($age < 0) {
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

    public static function update_nationality($post) {

        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        if (!isset($post['nationality']) || empty($post['nationality'])) {
            return Self::generateErrorMessage(false, 400, 'Nationality Not Provided.');
        }

        $user_id = $post['user_id'];
        $session_token = $post['session_token'];
        $nationality = $post['nationality'];

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where([ 'id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Nationality Is Not Provided, Or Empty, Return Error */
        if (empty($nationality)) {
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

    /* Get All Friends List Of Provided User Id */

    public static function friends($user_id, $session_token) {

        /* If User id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found For Provided User Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found For Provided Session Token, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* Container For Friends Information */
        $friends_arr = [];

        /* If Friends List Of User Is Not Empty, Push Information In Array Format in "friends_arr" array */
        if (!empty($user->user_friends)) {
            foreach ($user->user_friends as $key => $value) {
                array_push($friends_arr, Self::getArrayFormat($value->friend));
            }
        }

        if (empty($friends_arr)) {
            return [
                'status' => true,
                'data' => [
                    'user_info' => $user->getArrayResponse(),
                    'user_friends' => $friends_arr,
                    'message' => 'No friend exists for this user.'
                ]
            ];
        } else {
            /* Return Success Status, And User Information In Array Format */
            return [
                'status' => true,
                'data' => [
                    'user_info' => $user->getArrayResponse(),
                    'user_friends' => $friends_arr,
                ]
            ];
        }
    }

    /* Delete Friends From UserFriends Relation Table */

    public static function delete_friends($user_id, $session_token, $friends_id) {

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found For Provided User Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found For Provided Session Token, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches With Provided User Id, Return Error */
        if ($session->user_id != $user->id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided');
        }

        /* Find The Relation Of Provided User With Friend Provided */
        $friend = UsersFriends::where(['users_id' => $user_id, 'friends_id' => $friends_id])->first();

        /* If Friend Not Found For Provided Friends Id, Return Error */
        if (empty($friend)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Friends Id Provided.');
        }

        /* Delete Friends Relation From UsersFriends Table */
        $friend->delete();

        return [
            'status' => true,
            'data' => [],
        ];
    }

    /* Change Provided User's Image */

    public static function upload_image($user_id, $session_token, $request) {

        /* If User Id Is Not Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(flase, 400, 'User Id Should Be An Integer.');
        }

        /* Find USer For Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Session Token Validation */
        if (empty($session_token) || strlen($session_token) > 64) {
            return Self::generateErrorMessage(false, 400, 'Session Token Should Be An Alphenumeric String Of 64 Characters Only.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Doesn't Matches With Provided User, Return Error */
        if ($session->user_id != $user->id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Check That Uploads Directory Exists, If Not Create It */
        $path = storage_path() . DIRECTORY_SEPARATOR . 'uploads';
        if (!is_dir($path)) {
            mkdir($path, 0755);
        }

        /* Check That Users Directory Exists, If Not Create It */
        $path .= DIRECTORY_SEPARATOR . 'users';
        if (!is_dir($path)) {
            mkdir($path, 0755);
        }

        /* Check That Provided Users Directory Exists, If Not Create It */
        $path .= DIRECTORY_SEPARATOR . $user_id;
        if (!is_dir($path)) {
            mkdir($path, 0755);
        }

        /* Check That Provided Users Profile Directory Exist, If Not Create It */
        $path .= DIRECTORY_SEPARATOR . 'profile';
        if (!is_dir($path)) {
            mkdir($path, 0755);
        }

        $path .= DIRECTORY_SEPARATOR;

        /* If File Is Not Uploaded, Return Error */
        if (!$request->hasFile('picture')) {
            /* If Old Picture Exists For This User, Remove It. */
            if (!empty($user->profile_picture)) {
                if (is_file($path . $user->profile_picture)) {
                    unlink($path . $user->profile_picture);
                }
            }

            return [
                'status' => true,
                'data' => [
                    'message' => 'No image provided.'
                ],
            ];
        }

        /* If Old Picture Exists For This User, Remove It. */
        if (!empty($user->profile_picture)) {
            if (is_file($path . $user->profile_picture)) {
                unlink($path . $user->profile_picture);
            }
        }

        /* Upload File */
        $new_file_name = time() . '_profile_image.' . $request->picture->extension();
        $new_path = '/uploads/users/' . $user_id . '/profile';
        $request->picture->storeAs($new_path, $new_file_name);

        /* Save Updated Image Name In User's Table */
        $user->profile_picture = $new_file_name;
        $user->save();

        $ac = new ActivityLog;
        $ac->users_id = $user_id;
        $ac->type = 'profile_picture';
        $ac->action = 'new';
        $ac->time = date('Y-m-d H:i:s', time());
        $ac->save();

        /* New Url Of Uploaded Image */
        $image_url = UrlGenerator::GetUploadsUrl() . 'users/' . $user_id . '/profile/' . $user->profile_picture;

        return [
            'status' => true,
            'data' => [
                'image_url' => $image_url,
                'message' => 'Image updated successfully.'
            ],
        ];
    }

    public static function change_password($post) {

        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        if (!isset($post['old_password']) || empty($post['old_password'])) {
            return Self::generateErrorMessage(false, 400, 'Old Password Not Provided.');
        }

        if (!isset($post['new_password']) || empty($post['new_password'])) {
            return Self::generateErrorMessage(false, 400, 'New Password Not Provided.');
        }

        if (!isset($post['new_password_confirmation']) || empty($post['new_password_confirmation'])) {
            return Self::generateErrorMessage(false, 400, 'Password Confirmation Not Provided.');
        }

        $user_id = $post['user_id'];
        $session_token = $post['session_token'];
        $old_password = $post['old_password'];
        $new_password = $post['new_password'];
        $new_password_confirmation = $post['new_password_confirmation'];

        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        $user = Self::where(['id' => $user_id])->first();

        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        $session = Session::where(['id' => $session_token])->first();

        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided');
        }

        $old_password_check = $old_password;
        $old_password = sha1($old_password);

        if ($user->password != $old_password) {
            return Self::generateErrorMessage(false, 400, 'Old Password Donot Match.');
        }

        /* New Password Length */
        if (strlen($new_password) < 6 | strlen($new_password) > 32) {
            return Self::generateErrorMessage(false, 400, 'New Password Length Should Be Between (6-32) characters.');
        }

        /* Check If New Password Matches The Required Format */
        if (!preg_match('/^[a-zA-Z0-9._]+$/', $new_password)) {
            return [
                'data' => [
                    'error' => 400,
                    'message' => 'Password can only contain alphanumeric characters.',
                ],
                'status' => false
            ];
        }

        /* If New Password And Confirmation Password Don't Match, Return Error */
        if ($new_password != $new_password_confirmation) {
            return Self::generateErrorMessage(false, 400, 'New Password And Confirm Password Donot Match.');
        }

        if ($new_password == $old_password_check) {
            return Self::generateErrorMessage(false, 400, 'New password cannot be the same as old password, please enter new password.');
        }

        /* Encode New Password Using Sh1 Encoding Before Saving To Database */
        $user->password = sha1($new_password);

        $user->save();

        $user->sendPasswordChangeEmail();

        $session->id = Self::generateRandomString();

        $session->save();

        return [
            'status' => true,
            'data' => [
                'message' => 'Password Changed Successfully.'
            ],
        ];
    }

    /* Get List Of All Blocked Users In Database By The Provided User */

    public static function block_list($user_id, $session_token) {

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found For Provided Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* FInd Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found for The Provided Session Token, Return Error. */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Provided User Id Doesn't Matches The Session's User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Container For User's Block List */
        $user_blocks_arr = [];

        /* If Users In Block List Exist, Convert Their Information In Array Formati And Store In "user_blocks_arr" array */
        if (!empty($user->user_blocks)) {
            foreach ($user->user_blocks as $key => $value) {
                array_push($user_blocks_arr, Self::getArrayFormat($value->block));
            }
        }

        if (!empty($user_blocks_arr)) {
            /* Return Success Status, And Blocked User's List In Data */
            return [
                'status' => true,
                'data' => [
                    'blocked_list' => $user_blocks_arr
                ]
            ];
        } else {
            /* Return Success Status, And Blocked User's List In Data */
            return [
                'status' => true,
                'data' => [
                    'blocked_list' => $user_blocks_arr,
                    'message' => 'No user exists in your block list.'
                ]
            ];
        }
    }

    /* Unblock Friend Api */

    public static function unblock_friend($post) {

        /* If "user_id" Not Sent In Arguments, Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* If User Id Is Not Numeric, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer');
        }

        /* Find User With Provided User Id. */
        $user_id = $post['user_id'];
        $user = User::where(['id' => $post['user_id']])->first();

        /* If User Not Found With Provided User Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If "session_token" Not Sent Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session With Provided Session Token */
        $session_token = $post['session_token'];
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Doesn't Matches Provided User Id, Return Error  */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If "friends_id" Not Provided, Or Is Empty, Return Error */
        if (!isset($post['friend_id']) || empty($post['friend_id'])) {
            return Self::generateErrorMessage(false, 400, 'Friend Id Not Provided.');
        }

        /* If Provided Friend Id Is Not An Integer, Return Error */
        if (!is_numeric($post['friend_id'])) {
            return Self::generateErrorMessage(false, 400, 'Friend Id Should Be An Integer.');
        }

        /* Find Friend For The Provided Friend Id */
        $friend_id = $post['friend_id'];
        $friend = Self::where(['id' => $friend_id])->first();

        /* If Frind Not Found For The Provided Friend Id, Return Error */
        if (empty($friend)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Friend Id Provided.');
        }

        /* Find Relation Of User With The Friend In The UsersBlocks Table */
        $friend_relation = UsersBlocks::where(['users_id' => $user_id, 'blocks_id' => $friend_id])->first();

        /* If Relation Not Found, Return Error */
        if (empty($friend_relation)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Friend Id Provided.');
        }

        /* Delete Relation Record With Friend */
        $friend_relation->delete();

        /* Return Status True With Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'Friend Unblocked Successfully.'
            ],
        ];
    }

    /* Hidden Content Api */

    public static function hidden_content($user_id, $session_token) {

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Get All User's Hidden Content */
        $hidden_content = $user->user_hidden_content;
        /* Container For Array Format Of Content */
        $hidden_content_arr = [];

        /* If Hidden Content For Provided User Is Not Empty, Get Array Format Of Content */
        if (!empty($hidden_content)) {
            foreach ($hidden_content as $key => $value) {
                array_push($hidden_content_arr, $value->getArrayResponse());
            }
        }

        if (empty($hidden_content_arr)) {
            $hidden_content_arr = [
                'message' => 'No hidden content found.'
            ];
        }
        /* Return Status True, And Content Data In Response */
        return [
            'success' => true,
            'data' => $hidden_content_arr
        ];
    }

    public static function change_online_status($post) {

        /* If User Id Is Not Set Or Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id Not Provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        $user_id = $post['user_id'];

        /* Find User For The Provided Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found For The Provided User Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User id Provided.');
        }

        /* If Session Token Not Set Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found For The Provided Session Token, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Doesn't Matches The Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Status Field Is Not Set Or Empty, Return Error */
        if (!isset($post['status'])) {
            return Self::generateErrorMessage(false, 400, 'Status Not Provided.');
        }

        if ($post['status'] != Session::ONLINE_STATUS_SHOW && $post['status'] != Session::ONLINE_STATUS_HIDE) {
            return Self::generateErrorMessage(false, 400, 'Status should be either (' . Session::ONLINE_STATUS_SHOW . ' = show,' . Session::ONLINE_STATUS_HIDE . ' = hide)');
        }

        /* Set Session's Show Status Equal To Status */
        $session->show_status = $post['status'];
        $session->save();

        /* Return Status True, And Message of Status Change Success */
        return [
            'status' => true,
            'data' => [
                'message' => 'Status Changed Successfully'
            ]
        ];
    }

    public static function unhide_content($post) {

        /* If User Id Not Provided or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* if User Id Is Not Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where(['id' => $post['user_id']])->first();

        /* If User Not Found For The Provided Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Session Token Not Provided Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For The Provided Session id */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found For The Provided Session Id, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Doesn't Matches The Provided User Id, Return Error */
        if ($session->user_id != $post['user_id']) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Hidden Id Not Provided Or Is Empty, Return Error */
        if (!isset($post['hidden_id']) || empty($post['hidden_id'])) {
            return Self::generateErrorMessage(false, 400, 'Hidden Id Not Provided.');
        }

        /* If Hidden Id Is Not An Integer, Return Error */
        if (!is_numeric($post['hidden_id'])) {
            return Self::generateErrorMessage(false, 400, 'Hidden Id Should Be An Integer.');
        }

        /* Find Hidden Content Relation In UsersHiddenContent Table */
        $hidden = UsersHiddenContent::where(['id' => $post['hidden_id']])->first();

        /* If Relation Not Found, Return Error */
        if (empty($hidden)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Hidden Id Provided.');
        }

        /* Delete The Searched Relation */
        $hidden->delete();

        /* Return Status True, And Success Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'Content Unhidden Successfully'
            ]
        ];
    }

    /* Deactivate Account Api */

    public static function deactivate_account($post) {

        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        if (!isset($post['password']) || empty($post['password'])) {
            return Self::generateErrorMessage(false, 400, 'Password Not Provided.');
        }

        if (!isset($post['password_confirmation']) || empty($post['password_confirmation'])) {
            return Self::generateErrorMessage(false, 400, 'Password Confirmation Not Provided.');
        }

        $user_id = $post['user_id'];
        $session_token = $post['session_token'];
        $password = $post['password'];
        $password_confirmation = $post['password_confirmation'];

        /* If User Id Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* FInd User For The Provided User Id */
        $user = Self::where(['id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* if Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Match Password With Password Confirmation Field */
        if ($password != $password_confirmation) {
            return Self::generateErrorMessage(false, 400, 'Passwords Donot Match.');
        }

        /* Take Sha1 Hash Of Password To Compare With User's Password */
        $password_hash = sha1($password);

        /* If Provided Password's Hash Doesn't Matches Password Hash Of User, Return Error */
        if ($user->password != $password_hash) {
            return Self::generateErrorMessage(false, 400, 'Wrong Password Entered.');
        }

        /* Change Status Of User's Account To Deactive */
        $user->status = Self::STATUS_DEACTIVE;

        /* Save The User */
        $user->save();

        /* Send Email Of Deactivate Confirmation To User */
        $user->sendDeactiveConfirmationEmail();

        /* Return Success Status, And Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'Account Deactivated Successfully.'
            ],
        ];
    }

    public static function update_contact_privacy($post) {

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where([ 'id' => $post['user_id']])->first();

        /* If User Not Found For The Provided Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Session Token Is Not Set Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For Provided Session Token  */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Token Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Not Equal To Provided User Id, Return Error */
        if ($session->user_id != $post['user_id']) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Set Permission For Friendship Requests */
        if (isset($post['permission_friendship_request']) && !empty($post['permission_friendship_request'])) {

            if (!is_numeric($post['permission_friendship_request'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_friendship_request', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_friendship_request'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_friendship_request';
                $setting->val = $post['permission_friendship_request'];
                $setting->save();
            } else {
                $setting->val = $post['permission_friendship_request'];
                $setting->save();
            }
        }

        /* Set Permission For Follow */
        if (isset($post['permission_follow']) && !empty($post['permission_follow'])) {

            if (!is_numeric($post['permission_follow'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_follow', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_follow'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_follow';
                $setting->val = $post['permission_follow'];
                $setting->save();
            } else {
                $setting->val = $post['permission_follow'];
                $setting->save();
            }
        }

        /* Set Permission For Messages */
        if (isset($post['permission_message']) && !empty($post['permission_message'])) {

            if (!is_numeric($post['permission_message'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_message', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_message'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_message';
                $setting->val = $post['permission_message'];
                $setting->save();
            } else {
                $setting->val = $post['permission_message'];
                $setting->save();
            }
        }

        /* Set Permission For Email And Phone View */
        if (isset($post['permission_view_email_phone']) && !empty($post['permission_view_email_phone'])) {

            if (!is_numeric($post['permission_view_email_phone'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_view_email_phone', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_view_email_phone'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_view_email_phone';
                $setting->val = $post['permission_view_email_phone'];
                $setting->save();
            } else {
                $setting->val = $post['permission_view_email_phone'];
                $setting->save();
            }
        }

        /* Set Permission For Last Seen */
        if (isset($post['permission_view_last_seen']) && !empty($post['permission_view_last_seen'])) {

            if (!is_numeric($post['permission_view_last_seen'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_view_last_seen', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_view_last_seen'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_view_last_seen';
                $setting->val = $post['permission_view_last_seen'];
                $setting->save();
            } else {
                $setting->val = $post['permission_view_last_seen'];
                $setting->save();
            }
        }

        /* Set Permission For View Address */
        if (isset($post['permission_view_address']) && !empty($post['permission_view_address'])) {

            if (!is_numeric($post['permission_view_address'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_view_address', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_view_address'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_view_address';
                $setting->val = $post['permission_view_address'];
                $setting->save();
            } else {
                $setting->val = $post['permission_view_address'];
                $setting->save();
            }
        }

        /* Set Permission For View Post */
        if (isset($post['permission_view_post']) && !empty($post['permission_view_post'])) {

            if (!is_numeric($post['permission_view_post'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_view_post', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_view_post'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_view_post';
                $setting->val = $post['permission_view_post'];
                $setting->save();
            } else {
                $setting->val = $post['permission_view_post'];
                $setting->save();
            }
        }

        /* Set Permission For Friend List */
        if (isset($post['permission_view_friendlist']) && !empty($post['permission_view_friendlist'])) {

            if (!is_numeric($post['permission_view_friendlist'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_view_friendlist', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_view_friendlist'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_view_friendlist';
                $setting->val = $post['permission_view_friendlist'];
                $setting->save();
            } else {
                $setting->val = $post['permission_view_friendlist'];
                $setting->save();
            }
        }

        /* Set Permission For View Age */
        if (isset($post['permission_view_age']) && !empty($post['permission_view_age'])) {

            if (!is_numeric($post['permission_view_age'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'permission_view_age', Should Be An Integer.");
            }

            $setting = UsersPrivacySettings::where([ 'users_id' => $post['user_id'], 'var' => 'permission_view_age'])->first();

            if (empty($setting)) {
                $setting = new UsersPrivacySettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'permission_view_age';
                $setting->val = $post['permission_view_age'];
                $setting->save();
            } else {
                $setting->val = $post['permission_view_age'];
                $setting->save();
            }
        }

        return [
            'status' => true,
            'data' => [
                'message' => 'Permissions Updated Successfully'
            ]
        ];
    }

    /* Update Notification Settings Api */

    public static function update_notification_settings($post) {

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Not Provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User Id Should Be An Integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where([ 'id' => $post['user_id']])->first();

        /* If User Not Found For The Provided Id, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* If Session Token Is Not Set Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session Token Not Provided.');
        }

        /* Find Session For Provided Session Token  */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Token Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong Session Token Provided.');
        }

        /* If Session's User Id Not Equal To Provided User Id, Return Error */
        if ($session->user_id != $post['user_id']) {
            return Self::generateErrorMessage(false, 400, 'Wrong User Id Provided.');
        }

        /* Change Settings For Message Notifications */
        if (isset($post['message_notification']) && !empty($post['message_notification'])) {

            if (!is_numeric($post['message_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'message_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'message_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'message_notification';
                $setting->val = $post['message_notification'];
                $setting->save();
            } else {
                $setting->val = $post['message_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Friendship Notification */
        if (isset($post['friendship_notification']) && !empty($post['friendship_notification'])) {

            if (!is_numeric($post['friendship_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'friendship_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'friendship_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'friendship_notification';
                $setting->val = $post['friendship_notification'];
                $setting->save();
            } else {
                $setting->val = $post['friendship_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Comment Notifications */
        if (isset($post['comment_notification']) && !empty($post['comment_notification'])) {

            if (!is_numeric($post['comment_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'comment_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'comment_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'comment_notification';
                $setting->val = $post['comment_notification'];
                $setting->save();
            } else {
                $setting->val = $post['comment_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Nearby Activity Notifiations */
        if (isset($post['nearby_activity_notification']) && !empty($post['nearby_activity_notification'])) {

            if (!is_numeric($post['nearby_activity_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'nearby_activity_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'nearby_activity_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'nearby_activity_notification';
                $setting->val = $post['nearby_activity_notification'];
                $setting->save();
            } else {
                $setting->val = $post['nearby_activity_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Travoo Announcement Notifications */
        if (isset($post['travooo_announcement_notification']) && !empty($post['travooo_announcement_notification'])) {

            if (!is_numeric($post['travooo_announcement_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'travooo_announcement_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'travooo_announcement_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'travooo_announcement_notification';
                $setting->val = $post['travooo_announcement_notification'];
                $setting->save();
            } else {
                $setting->val = $post['travooo_announcement_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Plan Notification */
        if (isset($post['plan_notification']) && !empty($post['plan_notification'])) {

            if (!is_numeric($post['plan_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'plan_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'plan_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'plan_notification';
                $setting->val = $post['plan_notification'];
                $setting->save();
            } else {
                $setting->val = $post['plan_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Friend Group Request Notification */
        if (isset($post['friend_group_request_notification']) && !empty($post['friend_group_request_notification'])) {

            if (!is_numeric($post['friend_group_request_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'friend_group_request_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'friend_group_request_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'friend_group_request_notification';
                $setting->val = $post['friend_group_request_notification'];
                $setting->save();
            } else {
                $setting->val = $post['friend_group_request_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Follow Notification */
        if (isset($post['follow_notification']) && !empty($post['follow_notification'])) {

            if (!is_numeric($post['follow_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'follow_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'follow_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'follow_notification';
                $setting->val = $post['follow_notification'];
                $setting->save();
            } else {
                $setting->val = $post['follow_notification'];
                $setting->save();
            }
        }

        /* Change Settings For Email Notification */
        if (isset($post['email_notification']) && !empty($post['email_notification'])) {

            if (!is_numeric($post['email_notification'])) {
                return Self::generateErrorMessage(false, 400, "Invalid Value For 'email_notification', Should Be An Integer.");
            }

            $setting = UsersNotificationSettings::where(['users_id' => $post['user_id'], 'var' => 'email_notification'])->first();

            if (empty($setting)) {
                $setting = new UsersNotificationSettings;
                $setting->users_id = $post['user_id'];
                $setting->var = 'email_notification';
                $setting->val = $post['email_notification'];
                $setting->save();
            } else {
                $setting->val = $post['email_notification'];
                $setting->save();
            }
        }

        /* Return Success Status, And Success Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'Notification Settings Updated Successfully.'
            ]
        ];
    }

    /* Tag Friends Function */

    public static function tag($user_id, $session_token, $query) {

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For Provided User Id */
        $user = User::where(['id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't matches Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Query's Length Is Not Between 1-100, Return Error */
        if (strlen($query) < 1 || strlen($query) > 100) {
            return Self::generateErrorMessage(false, 400, 'Query length should be between (1-100) characters.');
        }

        /* If Query Is Not An Alphanumeric String, Return Error */
        if (!preg_match('/^[a-zA-Z0-9.,_ ]+$/', $query)) {
            return Self::generateErrorMessage(false, 400, 'Query can only contain alphanumeric characters.');
        }

        /* Container For Friends Information In Array Format */
        $friends_arr = [];

        /* If Friends Exist For Provided User, Return Array Response Of Friends Information */
        if (!empty($user->user_friends)) {
            foreach ($user->user_friends as $key => $value) {
                # code...
                if (!empty($value->friend)) {

                    $friend = $value->friend;
                    if (strpos(strtolower($friend->name), strtolower($query)) !== false) {
                        array_push($friends_arr, Self::getArrayFormat($friend));
                    }
                }
            }
        }

        if (!empty($friends_arr)) {
            /* Return Success Status, Along With Friends Data in "friends" key */
            return [
                'status' => true,
                'data' => [
                    'friends' => $friends_arr
                ]
            ];
        } else {
            /* Return Success Status, Along With Friends Data in "friends" key */
            return [
                'status' => true,
                'data' => [
                    'friends' => $friends_arr,
                    'message' => 'No friends found for the given query.'
                ]
            ];
        }
    }

    /* Send Friend Request Function */

    public static function send_friend_request($request) {

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided user Id */
        $user = User::where(['id' => $post['user_id']])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Is Not Set, Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* if Session's User Doesn't Matches Provided user Id, Return Error */
        if ($session->user_id != $post['user_id']) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Friend Id Is Not Set Or is Empty, Return Error */
        if (!isset($post['friend_id']) || empty($post['friend_id'])) {
            return Self::generateErrorMessage(false, 400, 'Friend id not provided.');
        }

        /* If Friend Id Is Not An Integer, Return Error */
        if (!is_numeric($post['friend_id'])) {
            return Self::generateErrorMessage(false, 400, 'Friend id should be an integer.');
        }

        /* Find Friend For Provided Friend Id */
        $friend = User::where(['id' => $post['friend_id']])->first();

        /* if Friend Not Found, Return Error */
        if (empty($friend)) {
            return Self::generateErrorMessage(false, 400, 'Wrong friend id provided.');
        }

        /* Find Old Highest Id To Assign Unique Id To New Entry */
        $old_id = UsersFriendRequests::whereRaw('id = (select max(`id`) from `users_friend_requests`)')->first();

        /* If Last Id Not Found, Start From 0 */
        if (!empty($old_id)) {
            $old_id = $old_id->id;
        } else {
            $old_id = 0;
        }

        /* Increment 1 In Last Id And Assign To New Row */
        $old_id++;

        /* Find Previous Friend Request Record For This User Id And Friend Id */
        $friend_request = UsersFriendRequests::where(['to' => $post['friend_id'], 'from' => $post['user_id']])->first();
        /* If Previous Record Not Found, Create New Entry */
        if (empty($friend_request)) {
            $friend_request = new UsersFriendRequests;

            /* Load Data In UsersFriendRequests Model */
            $friend_request->id = $old_id;
            $friend_request->from = $post['user_id'];
            $friend_request->to = $post['friend_id'];
            $friend_request->status = UsersFriendRequests::STATUS_PENDING;

            /* Save Record */
            $friend_request->save();
        }

        /* Return Success Status, Along With Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'Friend request sent.'
            ]
        ];
    }

    /* Display Friend Requests Function */

    public static function display_friend_requests($user_id, $session_token) {

        /* If User Id Is Not A Number, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* Find User For Provided User Id */
        $user = User::where(['id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* Container For Array Response */
        $array_response = [];

        /* If User Has Friend Requests, Return Array Response */
        if (!empty($user->my_friend_requests)) {
            foreach ($user->my_friend_requests as $key => $value) {
                array_push($array_response, [
                    'request_id' => $value->id,
                    'from' => $value->from,
                    'to' => $value->to,
                    'status' => $value->status,
                    'created_at' => $value->created_at
                ]);
            }
        }

        if (!empty($array_response)) {
            /* Return Success Status, Along With Friend Requests */
            return [
                'status' => true,
                'data' => [
                    'friend_requests' => $array_response
                ]
            ];
        } else {
            /* Return Success Status, Along With Friend Requests */
            return [
                'status' => true,
                'data' => [
                    'friend_requests' => $array_response,
                    'message' => 'No friend requests found for this user.'
                ]
            ];
        }
    }

    /* Accept Friend Requests Function */

    public static function accept_friend_request($request) {

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id is Not An Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = self::where(['id' => $post['user_id']])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Provided, Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /*  if Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $post['user_id']) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Friend Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['friend_id']) || empty($post['friend_id'])) {
            return Self::generateErrorMessage(false, 400, 'Friend id not provided.');
        }

        /* If Friend Id Is Not An Integer, Return Error */
        if (!is_numeric($post['friend_id'])) {
            return Self::generateErrorMessage(false, 400, 'Friend id should be an integer.');
        }

        /* Find Friend For The Provided Friend Id */
        $friend = Self::where(['id' => $post['friend_id']])->first();

        /* If Friend Not Found For The Provided Friend Id, Return Error */
        if (empty($friend)) {
            return Self::generateErrorMessage(false, 400, 'Wrong friend id provided.');
        }

        /* Find Friend Request Record For Provided User Id And Friend Id, With Status STATUS_PENDING */
        $friend_request = UsersFriendRequests::where(['to' => $post['user_id'], 'from' => $post['friend_id'], 'status' => UsersFriendRequests::STATUS_PENDING])->first();
        /* If Request Not Found, Return Error */
        if (empty($friend_request)) {
            return Self::generateErrorMessage(false, 400, 'No pending friend request exists for this friend.');
        }

        /* Update Status Of Friend Request TO Accepted And Save Request */
        $friend_request->status = UsersFriendRequests::STATUS_ACCEPTED;
        $friend_request->save();

        /* Create A UsersFriends Record With User To Friend */
        $user_friend = new UsersFriends;
        $user_friend->users_id = $post['user_id'];
        $user_friend->friends_id = $post['friend_id'];
        $user_friend->save();

        /* Create A UsersFriends Record With Friend To User */
        $user_friend = new UsersFriends;
        $user_friend->users_id = $post['friend_id'];
        $user_friend->friends_id = $post['user_id'];
        $user_friend->save();


        $ac = new ActivityLog;
        $ac->users_id = $post['user_id'];
        $ac->type = 'friend_request';
        $ac->action = 'accept';
        $ac->variable = $post['friend_id'];
        $ac->time = date('Y-m-d H:i:s', time());
        $ac->save();

        /* Return Success Status, Along With Success Message in Data */
        return [
            'status' => true,
            'data' => [
                'message' => 'Friend request accepted.'
            ]
        ];
    }

    public static function block_user($request) {

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id is Not An Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = self::where(['id' => $post['user_id']])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Provided, Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /*  if Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $post['user_id']) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Friend Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['block_id']) || empty($post['block_id'])) {
            return Self::generateErrorMessage(false, 400, 'Block id not provided.');
        }

        /* If Block Id Is Not An Integer, Return Error */
        if (!is_numeric($post['block_id'])) {
            return Self::generateErrorMessage(false, 400, 'Block id should be an integer.');
        }

        /* Find User For The Provided Block Id */
        $block_user = Self::where(['id' => $post['block_id']])->first();

        /* If Block User Not Found For The Provided Block Id, Return Error */
        if (empty($block_user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong block id provided.');
        }

        /* Find Block Record For Provided User Id And Block id */
        $block_record = UsersBlocks::where(['users_id' => $post['user_id'], 'blocks_id' => $post['block_id']])->first();

        /* If Record Found. Return Already Blocked Message */
        if (!empty($block_record)) {
            return Self::generateErrorMessage(false, 400, 'User already blocked.');
        }

        /* Create New Record For Blocked User */
        $block_record = new UsersBlocks;

        /* Load Information In UsersBlocks Record */
        $block_record->users_id = $post['user_id'];
        $block_record->blocks_id = $post['block_id'];

        /* Save Block Record */
        $block_record->save();

        /* Return Success Status, And Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'User blocked successfully.'
            ]
        ];
    }

    /* Show profile picture function */

    public static function show_profile_picture($user_id, $session_token) {

        /* If User Id is Not An Integer, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where([ 'id' => $user_id])->first();

        /* if User Not Found Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }
        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* get Url For The User's Profile Image */
        $image_url = $user->getProfilePictureUrl();

        /* If Url Found, Return In Data, Else Return Not Found Message */
        if (!empty($image_url)) {
            return [
                'status' => true,
                'data' => [
                    'profile_picture_url' => $image_url
                ]
            ];
        } else {
            return [
                'status' => true,
                'data' => [
                    'profile_picture_url' => $image_url,
                    'message' => 'No profile image found for this user.'
                ]
            ];
        }
    }

    /* Add to favourites Function */

    public static function add_favourites($request) {

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set, Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not An Integer, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where(['id' => $post['user_id']])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Is Not Set Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found For Provided Session Token, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Doesn't Matches Provided User Id, Return Error */
        if ($session->user_id != $post['user_id']) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Favourite Type Not Found, Return Error */
        if (!isset($post['fav_type']) || empty($post['fav_type'])) {
            return Self::generateErrorMessage(false, 400, 'Favourite type not provided.');
        }

        /* If Favourite User Id Not Provided, Or Is Empty, Return Error */
        if (!isset($post['fav_id']) || empty($post['fav_id'])) {
            return Self::generateErrorMessage(false, 400, 'Favourite id not provided.');
        }

        /* If Favourite Id Is Not An Integer, Return Error */
        if (!is_numeric($post['fav_id'])) {
            return Self::generateErrorMessage(false, 400, 'Favourite id should be an integer.');
        }

        /* Find Favourite User For Provided Favourite id */
        $fav_user = Self::where(['id' => $post['fav_id']])->first();

        /* if User Not Found, Return Error */
        if (empty($fav_user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong favourite id provided.');
        }

        /* Find Previous Record For Provided User Id And Favourite Id, In UsersFavourites Model */
        $users_favourite = UsersFavourites::where([ 'users_id' => $post['user_id'], 'fav_id' => $post['fav_id']])->first();

        /* If Record Not Found, Create New Record */
        if (empty($users_favourite)) {
            $users_favourite = new UsersFavourites;

            $users_favourite->users_id = $post['user_id'];
            $users_favourite->fav_type = $post['fav_type'];
            $users_favourite->fav_id = $post['fav_id'];

            $users_favourite->save();
        } else {

            /* If Previous Record Found, Return Error */
            return Self::generateErrorMessage(false, 400, 'This user is already in your favourite list.');
        }

        /* Return Success Status, Along With Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'User added to favourites successfully.'
            ]
        ];
    }

    /* Remove Favourtie Function */

    public static function remove_favourites($request) {

        /* Get Arguments From Post Request */
        $post = $request->input();

        /* If User Id Is Not Set Or Is Empty, Return Error */
        if (!isset($post['user_id']) || empty($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id not provided.');
        }

        /* If User Id Is Not Numeric, Return Error */
        if (!is_numeric($post['user_id'])) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* Find User For The Provided User Id */
        $user = Self::where(['id' => $post['user_id']])->first();

        /* if User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* If Session Token Not Set, Or Is Empty, Return Error */
        if (!isset($post['session_token']) || empty($post['session_token'])) {
            return Self::generateErrorMessage(false, 400, 'Session token not provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where(['id' => $post['session_token']])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Favourite Id Not Set, Or Is Empty, Return Error  */
        if (!isset($post['fav_id']) || empty($post['fav_id'])) {
            return Self::generateErrorMessage(false, 400, 'Favourite id not provided.');
        }

        /* If Favourite Id Is Not An Integer, Return Error */
        if (!is_numeric($post['fav_id'])) {
            return Self::generateErrorMessage(false, 400, 'Favourite id should be an integer.');
        }

        /* Find Favourite User For The Provided Favouriteif */
        $fav_user = Self::where(['id' => $post['fav_id']])->first();

        /* If Favourite User Not Found, Return Error */
        if (empty($fav_user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong favourite id provided.');
        }

        /* Find Record For Provided User Id And Favourite Id In UsersFavourites Relationship Model  */
        $favourite_record = UsersFavourites::where(['users_id' => $post['user_id'], 'fav_id' => $post['fav_id']])->first();

        /* If Record Not Found, Return Error */
        if (empty($favourite_record)) {
            return Self::generateErrorMessage(false, 400, 'This user is not in your favourite list.');
        }

        /* Delete The Favourtie Relation Between User And Favourite User */
        $favourite_record->delete();

        /* Return Success Status, With Success Message */
        return [
            'status' => true,
            'data' => [
                'message' => 'Favourites is removed from this user.'
            ]
        ];
    }

    /* Show Favourites Function */

    public static function show_favourites($user_id, $session_token) {

        /* If User Id Is Not Numeric, Or Is Empty, Return Error */
        if (!is_numeric($user_id)) {
            return Self::generateErrorMessage(false, 400, 'User id should be an integer.');
        }

        /* FInd User For The Provided User Id */
        $user = Self::where([ 'id' => $user_id])->first();

        /* If User Not Found, Return Error */
        if (empty($user)) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* Find Session For The Provided Session Token */
        $session = Session::where([ 'id' => $session_token])->first();

        /* If Session Not Found, Return Error */
        if (empty($session)) {
            return Self::generateErrorMessage(false, 400, 'Wrong session token provided.');
        }

        /* If Session's User Id Is Not Equal To Provided User Id, Return Error */
        if ($session->user_id != $user_id) {
            return Self::generateErrorMessage(false, 400, 'Wrong user id provided.');
        }

        /* Container For User's Favourite Items Array Format */
        $user_favourites_arr = [];

        /* If Favourite Items Exist For This User, Get Array Response */
        if (!empty($user->favourites)) {
            foreach ($user->favourites as $key => $value) {
                # code...
                $fav = self::where(['id' => $value->fav_id])->first();

                if (!empty($fav)) {
                    array_push($user_favourites_arr, [
                        'fav_type' => $value->fav_type,
                        'fav_info' => $fav->getArrayResponse()
                    ]);
                }
            }
        }

        /* If Favourite Items Exist For This User, Return Success Status, With Favourite Objects In Data */
        if (!empty($user_favourites_arr)) {
            return [
                'status' => true,
                'data' => [
                    'favourites' => $user_favourites_arr
                ]
            ];
        } else {
            /* If Favourite Items Donot Exist For This User, Return Success Status, With "No Favourite item message". */
            return [
                'status' => true,
                'data' => [
                    'favourites' => $user_favourites_arr,
                    'messages' => 'No favourites item found.'
                ]
            ];
        }
    }

    /* Return User Information In Array Format */

    public function getArrayResponse() {

        return [
            'id' => $this->id,
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'mobile_number' => $this->mobile,
            'address' => $this->address,
            'age' => $this->age,
            'nationality' => $this->nationality
        ];
    }

    /* Return User Information In Array Format */

    public static function getArrayFormat($model) {

        return [
            'id' => $model->id,
            'username' => $model->username,
            'name' => $model->name,
            'email' => $model->email,
            'status' => $model->status,
            'mobile_number' => $model->mobile,
            'address' => $model->address,
            'age' => $model->age,
            'nationality' => $model->nationality
        ];
    }

    /* Send Activation Email To User's Email Address */

    public function sendActivationMessage() {

        header('Access-Control-Allow-Origin: *');
        //if you need cookies or login etc
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 604800');
        //if you need special headers
        header('Access-Control-Allow-Headers: x-requested-with');

        $activation_code = Activation::where(['user_id' => $this->id])->first();

        $site_url = url('');
        $activation_url = $site_url . '/api/users/activate/' . $activation_code->token;

        $to = $this->email;

        $subject = 'Travoo Account Activation';
        $message = 'Click on the link given below to activate your travoo account.<br />
        <a href="' . $activation_url . '">Activate My Travoo Account</a>';
        $headers = 'From: travoo@abcd.com' . '\r\n' .
                'CC: travoo-test@abcd.com';

        // send email
        $mail_status = mail($to, $subject, $message, $headers);

        return true;
    }

    /* Send Mail To Reset Password With Reset Token */

    public function sendPasswordResetEmail() {

        header('Access-Control-Allow-Origin: *');
        //if you need cookies or login etc
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 604800');
        //if you need special headers
        header('Access-Control-Allow-Headers: x-requested-with');

        $password_reset_code = $this->password_reset_token;

        $site_url = url('');
        $new_password_url = 'javascript:void(0);';

        $to = $this->email;

        $subject = 'Travoo Account Password Reset';
        // $message = 'Click on the link given below to reset your travoo account password.<br />
        // <a href="' . $new_password_url . '">Reset My Travoo Account Password</a>';
        // $message = 'Password reset token : <p>' . $this->password_reset_token . '</p>';
        $message = 'Password reset token: ' . $password_reset_code;

        $headers = 'From: travoo@abcd.com' . '\r\n' .
                'CC: travoo-test@abcd.com';

        // send email
        $mail_status = mail($to, $subject, $message, $headers);

        return true;
    }

    public function sendPasswordChangeEmail() {

        header('Access-Control-Allow-Origin: *');
        //if you need cookies or login etc
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 604800');
        //if you need special headers
        header('Access-Control-Allow-Headers: x-requested-with');

        $password_reset_code = $this->password_reset_token;

        $site_url = url('');
        $new_password_url = 'javascript:void(0);';

        $to = $this->email;

        $subject = 'Travoo Account Password Change';
        $message = 'Your Travoo Account Password Has Been Changed Successfully.';
        $headers = 'From: travoo@abcd.com' . '\r\n' .
                'CC: travoo-test@abcd.com';

        // send email
        $mail_status = mail($to, $subject, $message, $headers);

        return true;
    }

    public function sendDeactiveConfirmationEmail() {

        header('Access-Control-Allow-Origin: *');
        //if you need cookies or login etc
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 604800');
        //if you need special headers
        header('Access-Control-Allow-Headers: x-requested-with');

        $to = $this->email;

        $subject = 'Travoo Account Deactivation';
        $message = 'Your Travoo Account Has Been Deactivated Successfully.';
        $headers = 'From: travoo@abcd.com' . '\r\n' .
                'CC: travoo-test@abcd.com';

        // send email
        $mail_status = mail($to, $subject, $message, $headers);

        return true;
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

    /**
     * @return string
     * */
    public function getProfilePictureUrl() {

        $path = 'users/' . $this->id . '/profile/' . $this->profile_picture;

        if (is_file(storage_path('uploads' . DIRECTORY_SEPARATOR . $path))) {

            $uploads_url = UrlGenerator::GetUploadsUrl();

            return $uploads_url . $path;
        }
    }

    /* Generate Error Message With provided "status", "code" and "message" */

    public static function generateErrorMessage($status, $code, $message) {

        $response = [];
        /* If Code == null */
        if ($code) {
            $response = [
                'data' => [
                    'error' => $code,
                    'message' => $message,
                ],
                'status' => $status
            ];
        } else {
            $response = [
                'data' => [
                    'message' => $message,
                ],
                'status' => $status
            ];
        }

        return $response;
    }

}
