<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Activities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `activities`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `activities` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `types_id` int(11) NOT NULL,
                  `countries_id` int(11) NOT NULL,
                  `cities_id` int(11) NOT NULL,
                  `places_id` int(11) NOT NULL,
                  `lat` decimal(10,8) NOT NULL,
                  `lng` decimal(11,8) NOT NULL,
                  `safety_degrees_id` int(11) NOT NULL,
                  `active` tinyint(4) NOT NULL,
                  PRIMARY KEY (`id`),
                  KEY `types_id` (`types_id`),
                  KEY `countries_id` (`countries_id`),
                  KEY `cities_id` (`cities_id`),
                  KEY `places_id` (`places_id`),
                  CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`types_id`) REFERENCES `conf_activities_types` (`id`),
                  CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
                  CONSTRAINT `activities_ibfk_3` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
                  CONSTRAINT `activities_ibfk_4` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`)
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
