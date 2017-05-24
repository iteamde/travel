<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitiesAirports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities_airports', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `cities_airports`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `cities_airports` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `cities_id` int(11) NOT NULL,
              `places_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `cities_id` (`cities_id`),
              KEY `places_id` (`places_id`),
              CONSTRAINT `cities_airports_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
              CONSTRAINT `cities_airports_ibfk_2` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`)
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
