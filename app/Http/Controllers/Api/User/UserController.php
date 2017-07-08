<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User\ApiUser as User;
use App\Http\Controllers\Controller;
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
    *   Log Out User And Destroy Session
    */
    public function logout(Request $request){

        $post = $request->input();

        $response = User::logout($post);

        return $response;
    }

    /*
    *   Send A Link To User's Email To Reset Their Password
    */
    public function forgot(Request $request){

        $post = $request->input();

        $response = User::forgotPassword($post);

        return $response;
    }

    /*
    *   Reset "password" Of Session Token's User With The "new_assword"
    */
    public function reset($token, $new_password, $confirm_password){

        $response = User::changePassword($token, $new_password, $confirm_password);
        
        return $response;
    }

    /*
    *   Activate The User Associated With The Provided Activation "token"
    */
    public function activate($token){
        
        $response = User::activate($token);
        
        return $response;
    }

    /*
    *   Get Information Of The Session's User After Validating "session_token" and "user_id"
    */
    public function information($user_id, $session_token){

        $response = User::information($user_id, $session_token);

        return $response;
    }

    public function update_fullname($user_id, $session_token, $fullname){

        $response = User::update_fullname($user_id, $session_token, $fullname);

        return $response;
    }

    public function update_mobile($user_id, $session_token, $mobile){

        $response = User::update_mobile($user_id, $session_token, $mobile);

        return $response;
    }

    public function update_address($user_id, $session_token, $address){

        $response = User::update_address($user_id, $session_token, $address);

        return $response;
    }

    public function update_age($user_id, $session_token, $age){

        $response = User::update_age($user_id, $session_token, $age);
        
        return $response;
    }

    public function update_nationality($user_id, $session_token, $nationality){
        
        $response = User::update_nationality($user_id, $session_token, $nationality);

        return $response;
    }
}
