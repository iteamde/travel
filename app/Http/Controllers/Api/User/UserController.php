<?php

namespace App\Http\Controllers\Api\User;

/* Dependencies */
use App\Models\User\ApiUser as User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * @resource User
 *
 * All users & membership operations
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct()//(UserRepository $users, RoleRepository $roles)
    {
        // $this->users = $users;
        // $this->roles = $roles;
    }

    /**
	 * This is the short description [and should be unique as anchor tags link to this in navigation menu]
	 *
	 * This can be an optional longer description of your API call, used within the documentation.
	 *
	 */
    public function create(Request $request){

        $post = $request->input();

        $response = User::validateInputParams($post);

        if(!empty($response)){
            return $response;
        }

        $response = User::createUser($post);

        if(!empty($response)){
            return $response;
        }

        return false;
    }

    public function createStep1(Request $request){

        $post = $request->input();

        $response = User::validateStep1Signup($post);

        if(!empty($response)){
            return $response;
        }

        $response = User::createUserStep1($post);

        if(!empty($response)){
            return $response;
        }
    }

    public function createStep2(Request $request){

        $post = $request->input();

        $response = User::validateStep2Signup($post);

        if(!empty($response)){
            return $response;
        }

        $response = User::createUserStep2($post);

        if(!empty($response)){
            return $response;
        }
    }

    public function createStep3(Request $request){

        $post = $request->input();

        $response = User::validateStep3Signup($post);

        if(!empty($response)){
            return $response;
        }

        $response = User::createUserStep3($post);

        if(!empty($response)){
            return $response;
        }
    }

    public function createStep4(Request $request){

        $post = $request->input();

        $response = User::validateStep4Signup($post);

        if(!empty($response)){
            return $response;
        }

        $response = User::createUserStep4($post);

        if(!empty($response)){
            return $response;
        }
    }

    public function createStep5(Request $request){

        $post = $request->input();

        $response = User::validateStep5Signup($post);

        if(!empty($response)){
            return $response;
        }

        $response = User::createUserStep5($post);

        if(!empty($response)){
            return $response;
        }
    }

    /*
    *   Validate User And Create New Session If Not Exists.
    */
    public function login(Request $request){

        $post = $request->input();

        $response = User::loginValidation($post);

        if(!empty($response) ) {
            return $response;
        }

        $response = User::loginUser( $post , $request );

        return $response;
    }

    /*
    *   Log Out User And Destroy Session.
    */
    public function logout(Request $request){

        $post = $request->input();

        $response = User::logout($post);

        return $response;
    }

    /*
    *   Send A Link To User's Email To Reset Their Password.
    */
    public function forgot(Request $request){

        $post = $request->input();

        $response = User::forgotPassword($post);

        return $response;
    }

    /*
    *   Reset "password" Of Session Token's User With The "new_assword".
    */
    public function reset(Request $request){

        $post = $request->input();

        $token            = $request->input('token');
        $new_password     = $request->input('newpassword');
        $confirm_password = $request->input('newpassword_confirmation');

        $response = User::changePassword($token, $new_password, $confirm_password);

        return $response;
    }

    /*
    *   Activate The User Associated With The Provided Activation "token".
    */
    public function activate($token){

        $response = User::activate($token);

        return $response;
    }

    /*
    *   Get Information Of The Session's User After Validating "session_token" and "user_id".
    */
    public function information($user_id, $session_token){

        $response = User::information($user_id, $session_token);

        return $response;
    }

    /*
    *   Update Fullname of User After Validating "session_token" and "user_id".
    */
    public function update_fullname(Request $request){
        $post = $request->input();

        $response = User::update_fullname($post);

        return $response;
    }
    /*
    *   Update Mobile Number Of User After Validating "session_token" and "user_id".
    */
    public function update_mobile(Request $request){

        $post = $request->input();

        $response = User::update_mobile($post);

        return $response;
    }

    /*
    *   Update Address Of The Session's User After Validating "session_token" and "user_id".
    */
    public function update_address(Request $request){

        $post = $request->input();

        $response = User::update_address($post);

        return $response;
    }

    /*
    *   Update Age Of The Session's User After Validating "session_token" and "user_id".
    */
    public function update_age(Request $request){

        $post = $request->input();

        $response = User::update_age($post);

        return $response;
    }

    /*
    *   Update Nationality Of The Session's User After Validating "session_token" and "user_id".
    */
    public function update_nationality(Request $request){

        $post = $request->input();

        $response = User::update_nationality($post);

        return $response;
    }

    /*
    *   Get Friends Information Of The Session's User After Validating "session_token" and "user_id".
    */
    public function friends( $user_id, $session_token){

        $response = User::friends($user_id, $session_token);

        return $response;
    }

    /*
    *   Delete A Friend Of The Session's User After Validating "session_token" and "user_id".
    */
    public function delete_friends( $user_id, $session_token , $friends_id ) {

        $response = User::delete_friends($user_id, $session_token, $friends_id);

        return $response;
    }

    /*
    *   Update Profile Image Of The Session's User After Validating "session_token" and "user_id".
    */
    public function update_profile_image( $user_id, $session_token , Request $request){

        $response = User::upload_image($user_id, $session_token, $request);

        return $response;
    }

    /*
    *   Change Password Of The Session's User After Validating "session_token" And "user_id", And Validation *   Provided Passwords.
    */
    public function change_password(Request $request){

        $post = $request->input();

        $response = User::change_password($post);

        return $response;
    }

    /*
    *   Get List Of Blocked Users By The Provided Session's User After Validation Session Token And User Id.
    */
    public function block_list($user_id, $session_token){

        $response = User::block_list($user_id, $session_token);

        return $response;
    }

    /*
    *   Unblock A Friend
    */
    public function unblock_friend(Request $request){

        $post = $request->input();

        $response = User::unblock_friend($post);

        return $response;
    }

    /*
    *   Show All Hidden Contents
    */
    public function hidden_content($user_id, $session_token){

        $response = User::hidden_content($user_id, $session_token);

        return $response;
    }

    /*
    *   Change Online Status Api
    */
    public function change_online_status(Request $request){

        $post = $request->input();

        $response = User::change_online_status($post);

        return $response;
    }

    /*
    *   Unhide Content Api
    */
    public function unhide_content(Request $request){

        $post = $request->input();

        $response = User::unhide_content($post);

        return $response;
    }

    /*
    *   Deactivate Api
    */
    public function deactivate(Request $request){

        $post = $request->input();

        $response = User::deactivate_account($post);

        return $response;
    }

    /*
    *   Update Contact Privacy Api
    */
    public function update_contact_privacy(Request $request){

        $post = $request->input();

        $response = User::update_contact_privacy($post);

        return $response;
    }

    /*
    *   Update Notification Settings Api
    */
    public function update_notification_settings(Request $request){

        $post = $request->input();

        $response = User::update_notification_settings($post);

        return $response;
    }

    /* Tag Friends Api */
    public function tag($user_id, $session_token, $query){

        $response = User::tag($user_id, $session_token, $query);

        return $response;
    }

    /* Send Friend Request Api */
    public function friend_request(Request $request){

        $response = User::send_friend_request($request);

        return $response;
    }

    /* Display Friend Requests Api */
    public function my_friend_requests($user_id, $session_token){

        $response = User::display_friend_requests($user_id, $session_token);

        return $response;
    }

    /* Accept Friend Requests Api */
    public function accept_friend_request(Request $request){

        $response = User::accept_friend_request($request);

        return $response;
    }

    /* Block User Api */
    public function block_user(Request $request){

        $response = User::block_user($request);

        return $response;
    }

    /* Show Profile Picture Api */
    public function show_profile_picture($user_id, $session_token){

        $response = User::show_profile_picture($user_id, $session_token);

        return $response;
    }

    /* Add to favourites Api */
    public function add_favourites(Request $request){

        $response = User::add_favourites($request);

        return $response;
    }

    /* Remove Favourites Api */
    public function remove_favourites(Request $request){

        $response = User::remove_favourites($request);

        return $response;
    }

    /* Show Favourites Api */
    public function show_favourites($user_id,$session_token){

        $response = User::show_favourites($user_id,$session_token);

        return $response;
    }

    /* Social Media Login */
    public function FacebookSocialLogin(Request $request){
        
        $response = User::facebook_social_login($request->input());
       
        return $response;
    }

    /* Twitter Login Api */
    public function TwitterSocialLogin(Request $request){
        
        $response = User::twitter_social_login($request->input());
       
        return $response;
    }

    /* Twitter Login Page */
    public function TwitterSocialLoginPage(){
        
        set_time_limit(0);
        require_once base_path().'/vendor/autoload.php';
        // use Abraham\TwitterOAuth\TwitterOAuth;
         
        session_start();
         
        $config = require_once base_path().'/config/config.php';

        $config = config('config');

        // create TwitterOAuth object
        $twitteroauth = new TwitterOAuth($config['consumer_key'], $config['consumer_secret']);
         
        // request token of application
        $request_token = $twitteroauth->oauth(
            'oauth/request_token', [
                'oauth_callback' => $config['url_callback']
            ]
        );
         
        // throw exception if something gone wrong
        if($twitteroauth->getLastHttpCode() != 200) {
            return [
                'success' => false,
                'data'    => ['There was a problem performing this request'],
                'code'    => 400
            ]; 
            // throw new \Exception('There was a problem performing this request');
        }
            
        // save token of application to session
        $_SESSION['oauth_token'] = $request_token['oauth_token'];
        $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
        
        $arr = [
            'oauth_token'        => $request_token['oauth_token'],
            'oauth_token_secret' => $request_token['oauth_token_secret']
        ];

        return [
            'success' => true,
            'data'    => $arr,
            'code'    => 200
        ]; 
        // generate the URL to make request to authorize our application
        // $url = $twitteroauth->url(
        //     'oauth/authorize', [
        //         'oauth_token' => $request_token['oauth_token']
        //     ]
        // );
         
        // and redirect
        // header('Location: '. $url);
        // die();
    }

    public function TwitterSocialLoginSend(Request $request){

        $post   = $request->input();
        $errors = [];

        if(!isset($post['oauth_token']) || empty($post['oauth_token'])){
            $errors[] = 'OAuth Token not provided.';
        }

        if(!isset($post['oauth_token_secret']) || empty($post['oauth_token_secret'])){
            $errors[] = 'OAuth Token Secret not provided.';
        }

        if(!isset($post['oauth_verifier']) || empty($post['oauth_verifier'])){
            $errors[] = 'OAuth verifier not provided.';
        }

        if(!empty($errors)){
            return [
                'success' => false,
                'code' => 400,
                'data' => $errors
            ];   
        }

        require_once base_path().'/vendor/autoload.php';

        session_start();
         
        $config = require_once base_path().'/config/config.php';

        $config = config('config');

        $connection = new TwitterOAuth(
            $config['consumer_key'],
            $config['consumer_secret'],
            $post['oauth_token'],
            $post['oauth_token_secret']
        );
        
        $token = [];

        try {
            // request user token
            $token = $connection->oauth(
                'oauth/access_token', [
                    'oauth_verifier' => $post['oauth_verifier']
                ]
            );
        }
        catch (\Exception $e) {
            return [
                'success' => false,
                'code'    => 400,
                'data'    => [$e->getMessage()]
            ];
        }

        if(!empty($token)){
            // $twitter = new TwitterOAuth(
            //     $config['consumer_key'],
            //     $config['consumer_secret'],
            //     $token['oauth_token'],
            //     $token['oauth_token_secret']
            // );
            // $res = User::get_twitter_data($token);
            $connection = new TwitterOAuth(
                    $config['consumer_key'],
                    $config['consumer_secret'],
                    $token['oauth_token'],
                    $token['oauth_token_secret']
            );
            
            $user = $connection->get("account/verify_credentials", ['include_email' => 'true']);
            
            if( isset($user->id_str) && isset($user->email) ){

                $arr = [
                    'twuid' => $user->id_str,
                    'email' => $user->email
                ];
            
                $res = User::twitter_social_login($arr);
                
                return $res;
            }else{
                return [
                    'success' => false,
                    'code'    => 400,
                    'data'    => ['Error creating user.']
                ];
            }
        }else{
            return [
                'success' => false,
                'code'    => 400,
                'data'    => ['Token not returned from API.']
            ];   
        }

    }
}
