<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hotels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `hotels`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `hotels` (
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
              CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
              CONSTRAINT `hotels_ibfk_3` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE CASCADE
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
