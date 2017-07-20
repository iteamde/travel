<?php

namespace App\Http\Controllers\Api\Media;

/* Dependencies */

use App\Models\ActivityMedia\ApiMedia as Media;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * @resource Media
 *
 * Media (images & videos) uploaded by users
 */
class MediasController extends Controller {

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

        $response = Media::create($request);

        return $response;
    }

    /* Comment On Media Api */

    public function comment(Request $request) {

        $response = Media::comment($request);

        return $response;
    }

    /* Like Media Api */

    public function like(Request $request) {

        $response = Media::like($request);

        return $response;
    }

    /* Unlike Media Api */

    public function unlike(Request $request) {

        $response = Media::unlike($request);

        return $response;
    }

    /* Share Media Api */

    public function share(Request $request) {

        $response = Media::share($request);

        return $response;
    }

    /* Delete Media Api */

    public function delete(Request $request) {

        $response = Media::delete_media($request);

        return $response;
    }

    /* Hide Media Api */

    public function hide(Request $request) {

        $response = Media::hide($request);

        return $response;
    }

    /* Report Media Api */

    public function report(Request $request) {

        $response = Media::report($request);

        return $response;
    }

    /* Display Media Information Api */

    public function activity(Request $request) {

        $response = Media::activity($request);

        return $response;
    }

    /* Update Media Description Api */

    public function update_description(Request $request) {

        $response = Media::update_description($request);

        return $response;
    }

    /* List User's Media Api */

    public function listbyuser($user_id, $session_token, $media_user_id) {

        $response = Media::get_list_by_user($user_id, $session_token, $media_user_id);

        return $response;
    }

}
