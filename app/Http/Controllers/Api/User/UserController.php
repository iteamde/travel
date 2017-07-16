<?php

namespace App\Http\Controllers\Api\User;

/* Dependencies */
use App\Models\User\ApiUser as User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class UserController.
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

    /*
    *   Create New User.
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
    public function reset($token, $new_password, $confirm_password){

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
    public function update_fullname($user_id, $session_token, $fullname){

        $response = User::update_fullname($user_id, $session_token, $fullname);

        return $response;
    }
    /*
    *   Update Mobile Number Of User After Validating "session_token" and "user_id".
    */
    public function update_mobile($user_id, $session_token, $mobile){

        $response = User::update_mobile($user_id, $session_token, $mobile);

        return $response;
    }

    /*
    *   Update Address Of The Session's User After Validating "session_token" and "user_id".
    */
    public function update_address($user_id, $session_token, $address){

        $response = User::update_address($user_id, $session_token, $address);

        return $response;
    }

    /*
    *   Update Age Of The Session's User After Validating "session_token" and "user_id".
    */
    public function update_age($user_id, $session_token, $age){

        $response = User::update_age($user_id, $session_token, $age);
        
        return $response;
    }

    /*
    *   Update Nationality Of The Session's User After Validating "session_token" and "user_id".
    */
    public function update_nationality($user_id, $session_token, $nationality){
        
        $response = User::update_nationality($user_id, $session_token, $nationality);

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
    public function change_password($user_id, $session_token, $old_password, $new_password, $new_password_confirmation){

        $response = User::change_password($user_id, $session_token, $old_password, $new_password, $new_password_confirmation);
        
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
    public function deactivate($user_id, $session_token, $password, $password_confirmation){
            
        $response = User::deactivate_account($user_id, $session_token, $password, $password_confirmation);

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
}
