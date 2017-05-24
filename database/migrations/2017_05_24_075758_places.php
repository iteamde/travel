<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Places extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `places`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `places` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `cities_id` int(11) NOT NULL,
              `place_type_ids` int(11) NOT NULL,
              `lat` decimal(10,8) NOT NULL,
              `lng` decimal(11,8) NOT NULL,
              `safety_degrees_id` int(11) NOT NULL,
              `active` tinyint(4) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `cities_id` (`cities_id`),
              KEY `place_type_ids` (`place_type_ids`),
              KEY `safety_degrees_id` (`safety_degrees_id`),
              CONSTRAINT `places_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
              CONSTRAINT `places_ibfk_2` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
              CONSTRAINT `places_ibfk_5` FOREIGN KEY (`place_type_ids`) REFERENCES `conf_place_types` (`id`),
              CONSTRAINT `places_ibfk_6` FOREIGN KEY (`safety_degrees_id`) REFERENCES `conf_safety_degrees` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
