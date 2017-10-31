<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityMedia\Media;
use App\Models\Place\PlaceMedias;
use Illuminate\Support\Facades\DB;

class CronsController extends Controller {

    public function getPlacesMedia(Request $request) {
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(214, 216, 57, 211, 221, 222, 58, 218, 212, 59, 219, 215, 220, 217, 213)
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

    public function getPlacesMedia2(Request $request) {
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(172, 169, 167, 171, 238, 170, 239, 240, 241, 242, 243)
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

    public function getPlacesMedia3(Request $request) {
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(244, 245, 246, 247, 248, 249, 250)
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

    public function getPlacesMedia4(Request $request) {
        $places_without_media = \App\Models\Place\Place::whereNull('media_done')
                ->whereIn('places.cities_id', array(223, 224, 225, 226, 227, 53, 228, 52, 229, 230, 231, 50, 232, 51, 233, 234, 235, 236, 237)
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

    public function getHotelsMedia(Request $request) {
        $places_without_media = \App\Models\Hotels\Hotels::whereNull('media_done')
                ->whereIn('hotels.cities_id', array(214, 216, 57, 211, 221, 222, 58, 218, 212, 59, 219, 215, 220, 217, 213)
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

    public function getHotelsMedia2(Request $request) {
        $places_without_media = \App\Models\Hotels\Hotels::whereNull('media_done')
                ->whereIn('hotels.cities_id', array(172, 169, 167, 171, 238, 170, 239, 240, 241, 242, 243)
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

    public function getHotelsMedia3(Request $request) {
        $places_without_media = \App\Models\Hotels\Hotels::whereNull('media_done')
                ->whereIn('hotels.cities_id', array(244, 245, 246, 247, 248, 249, 250)
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

    public function getHotelsMedia4(Request $request) {
        $places_without_media = \App\Models\Hotels\Hotels::whereNull('media_done')
                ->whereIn('hotels.cities_id', array(223, 224, 225, 226, 227, 53, 228, 52, 229, 230, 231, 50, 232, 51, 233, 234, 235, 236, 237)
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


    public function getReataurantsMedia(Request $request) {
        $places_without_media = \App\Models\Restaurants\Restaurants::whereNull('media_done')
                ->whereIn('restaurants.cities_id', array(214, 216, 57, 211, 221, 222, 58, 218, 212, 59, 219, 215, 220, 217, 213)
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

    public function getReataurantsMedia2(Request $request) {
        $places_without_media = \App\Models\Restaurants\Restaurants::whereNull('media_done')
                ->whereIn('places.cities_id', array(172, 169, 167, 171, 238, 170, 239, 240, 241, 242, 243)
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
