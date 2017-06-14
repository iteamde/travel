<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestaurantsMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants_medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `restaurants_medias`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `restaurants_medias` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `restaurants_id` int(11) NOT NULL,
              `medias_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `restaurants_id` (`restaurants_id`),
              KEY `medias_id` (`medias_id`),
              CONSTRAINT `restaurants_medias_ibfk_1` FOREIGN KEY (`restaurants_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
              CONSTRAINT `restaurants_medias_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE
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
