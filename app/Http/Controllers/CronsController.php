<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;

class CronsController extends Controller { //spain

    public function getPlacesMedia(Request $request) {
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(184, 285, 286, 287, 288, 289, 290, 185, 291, 292, 293, 294, 186)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia2(Request $request) {  // japan
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(109, 322, 323, 108, 324, 325, 326, 327, 328, 330)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia3(Request $request) { // Austria
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(187,396,397,398,399,400,401,402)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia4(Request $request) { // Thailand
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(403,404,144,405,406,407,408)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia5(Request $request) { // Taiwan
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(116,378,115,379,380)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia6(Request $request) { //india
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(303,129,304,305,131,306,307,308,309,310,311,312)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia7(Request $request) { //germany
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(194,197,198,196,195,268,269,270,271,272,273,274,275,276)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia8(Request $request) { //Columbia
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(96,355,356,97,357,358,359,360,361)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia9(Request $request) { // Turkey
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(157,416,417,418,419,420,421,156)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesMedia10(Request $request) { //china
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(104,106,295,296,297,298,299,300,301)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'places_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new PlaceMedias;
                    $place_media->places_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getHotelsMedia(Request $request) { // UAE
        $places_without_media = \App\Models\Hotels\Hotels::whereNull('media_done')
                ->whereIn('hotels.cities_id', array(47,48,49,422,424,425)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/hotels/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/hotels/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/hotels/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/hotels/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'hotels_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new \App\Models\Hotels\HotelsMedias;
                    $place_media->hotels_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getRestaurantsMedia(Request $request) { // Turkey
        $places_without_media = \App\Models\Restaurants\Restaurants::whereNull('media_done')
                ->whereIn('restaurants.cities_id', array(157,416,417,418,419,420,421,156)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/restaurants/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'restaurants_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new \App\Models\Restaurants\RestaurantsMedias;
                    $place_media->restaurants_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getRestaurantsMedia2(Request $request) { // UAE
        $places_without_media = \App\Models\Restaurants\Restaurants::whereNull('media_done')
                ->whereIn('restaurants.cities_id', array(47,48,49,422,424,425)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/restaurants/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'restaurants_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new \App\Models\Restaurants\RestaurantsMedias;
                    $place_media->restaurants_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getRestaurantsMedia3(Request $request) { // Canada
        $places_without_media = \App\Models\Restaurants\Restaurants::whereNull('media_done')
                ->whereIn('restaurants.cities_id', array(223,224,225,226,227,53,228,52,229,230,231,50,232,51,233,234,235,236,237)
                )
                ->orderBy('id', 'ASC')
                ->take(5)
                ->get();

        foreach ($places_without_media AS $pwm) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/restaurants/media/go/' . $pwm->provider_id);
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/restaurants/media/go/' . $pwm->provider_id);
            }

            $photos = unserialize($json);

            echo $pwm->provider_id . ' ';
            if (is_array($photos)) {
                foreach ($photos AS $p) {
                    $media_file = 'restaurants_media/' . $pwm->provider_id . '/' . sha1(microtime()) . '.jpg';
                    Storage::disk('public')->put($media_file, $p);

                    $media = new Media;
                    $media->url = $media_file;
                    $media->save();

                    $place_media = new \App\Models\Restaurants\RestaurantsMedias;
                    $place_media->restaurants_id = $pwm->id;
                    $place_media->medias_id = $media->id;
                    $place_media->save();
                }
                echo count($photos);
            }
            echo '<br />';

            $pwm->media_done = 1;
            $pwm->save();
        }
    }

    public function getPlacesDetails($field, Request $request) {

        $places_missing_details = \App\Models\Place\Place::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/places/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/places/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/places/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

    public function getEmbassiesDetails($field, Request $request) {

        $places_missing_details = \App\Models\Embassies\Embassies::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/embassies/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/embassies/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/embassies/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/embassies/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/embassies/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

    public function getHotelsDetails($field, Request $request) {


        $places_missing_details = \App\Models\Hotels\Hotels::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/hotels/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/hotels/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/hotels/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/hotels/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/hotels/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

    public function getRestaurantsDetails($field, Request $request) {


        $places_missing_details = \App\Models\Restaurants\Restaurants::whereNull($field)
                ->orderBy('id', 'ASC')
                ->take(100)
                ->get();

        foreach ($places_missing_details AS $pmd) {
            if (time() % 4 == 0) {
                $json = file_get_contents('http://db.travooo.com/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travooo.com/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 1) {
                $json = file_get_contents('http://db.travooodev.com/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travooodev.com/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 2) {
                $json = file_get_contents('http://db.travoooapi.com/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.com/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            } elseif (time() % 4 == 3) {
                $json = file_get_contents('http://db.travoooapi.net/public/restaurants/details/go/' . $pmd->provider_id);
                echo 'http://db.travoooapi.net/public/restaurants/details/go/' . $pmd->provider_id . ' ';
            }

            $details = json_decode($json);
            echo $pmd->provider_id . ' ';

            if (is_object($details)) {
                $types = @join(",", $details->types);
                echo $types;
            }
            if (!isset($types)) {
                $types = '';
            }
            echo '<br />';

            $pmd->place_type = $types;
            $pmd->save();
        }
    }

}
