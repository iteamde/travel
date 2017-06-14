<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Restaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `restaurants`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `restaurants` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `cities_id` int(11) NOT NULL,
              `places_id` int(11) NOT NULL,
              `lat` decimal(10,8) NOT NULL,
              `lng` decimal(11,8) NOT NULL,
              `active` tinyint(4) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `cities_id` (`cities_id`),
              KEY `places_id` (`places_id`),
              CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `restaurants_ibfk_2` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
              CONSTRAINT `restaurants_ibfk_3` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE CASCADE
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
