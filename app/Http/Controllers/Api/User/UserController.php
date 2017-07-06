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
}
