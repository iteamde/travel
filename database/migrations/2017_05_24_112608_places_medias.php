<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlacesMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places_medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `places_medias`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `places_medias` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `places_id` int(11) NOT NULL,
              `medias_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `places_id` (`places_id`),
              KEY `medias_id` (`medias_id`),
              CONSTRAINT `places_medias_ibfk_1` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`),
              CONSTRAINT `places_medias_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`)
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
