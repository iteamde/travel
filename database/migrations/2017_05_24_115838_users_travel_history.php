<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTravelHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_travel_history', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `users_travel_history`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `users_travel_history` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) DEFAULT NULL,
              `cities_id` int(11) DEFAULT NULL,
              `places_id` int(11) DEFAULT NULL,
              `time` datetime NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `cities_id` (`cities_id`),
              KEY `places_id` (`places_id`),
              CONSTRAINT `users_travel_history_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `users_travel_history_ibfk_2` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
              CONSTRAINT `users_travel_history_ibfk_3` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE CASCADE
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
