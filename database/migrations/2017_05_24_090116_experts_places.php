<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpertsPlaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experts_places', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `experts_places`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `experts_places` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `users_id` int(10) unsigned NOT NULL,
              `places_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `places_id` (`places_id`),
              KEY `users_id` (`users_id`),
              CONSTRAINT `experts_places_ibfk_1` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`),
              CONSTRAINT `experts_places_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
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
