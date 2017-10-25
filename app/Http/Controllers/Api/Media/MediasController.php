<?php

namespace App\Http\Controllers\Api\Media;

/* Dependencies */

use App\Models\ActivityMedia\ApiMedia as Media;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

/**
 * @resource Media
 *
 * Media (images & videos) uploaded by users
 */
class MediasController extends Controller {

    public function __construct() {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth');
    }

    /**
     * Create a new Media
     *
     * This function will add new Media uploaded by user
     *
     * @param  integer $user_id         ID of user creating the Media
     * @param  string  $session_token   authentication session token for the user
     * @param  integer $language_id     ID of Language
     * @param  string  $media_file      Uploaded file for Media
     * @param  string  $media_description   short description about Media
     * @return boolean  returns true if the sql row does exist
     */
    public function create(Request $request) {
        $user = Auth::user();

        $response = Media::create($request, $user->id);

        return $response;
    }

    /* Comment On Media Api */

    public function comment(Request $request) {

        $user = Auth::user();

        $response = Media::comment($request, $user->id);

        return $response;
    }

    /* Like Media Api */

    public function like(Request $request) {
        $user = Auth::user();

        $response = Media::like($request, $user->id);

        return $response;
    }

    /* Unlike Media Api */

    public function unlike(Request $request) {
        $user = Auth::user();

        $response = Media::unlike($request, $user->id);

        return $response;
    }

    /* Share Media Api */

    public function share(Request $request) {
        $user = Auth::user();

        $response = Media::share($request, $user->id);

        return $response;
    }

    /* Delete Media Api */

    public function delete(Request $request) {
        $user = Auth::user();

        $response = Media::delete_media($request, $user->id);

        return $response;
    }

    /* Hide Media Api */

    public function hide(Request $request) {
        $user = Auth::user();

        $response = Media::hide($request, $user->id);

        return $response;
    }

    /* Report Media Api */

    public function report(Request $request) {
        $user = Auth::user();

        $response = Media::report($request, $user->id);

        return $response;
    }

    /* Display Media Information Api */

    public function activity(Request $request) {
        $user = Auth::user();

        $response = Media::activity($request, $user->id);

        return $response;
    }

    /* Update Media Description Api */

    public function update_description(Request $request) {
        $user = Auth::user();

        $response = Media::update_description($request, $user->id);

        return $response;
    }

    /* List User's Media Api */

    public function listbyuser($user_id, $session_token, $media_user_id) {

        $response = Media::get_list_by_user($user_id, $session_token, $media_user_id);

        return $response;
    }

}
