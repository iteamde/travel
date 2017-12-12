<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlacesFollowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places_followers', function(Blueprint $table) {
            $sql = 'CREATE TABLE `places_followers` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `places_id` int(11) NOT NULL,
            `users_id` int(10) unsigned NOT NULL,
            PRIMARY KEY (`id`),
            KEY `places_id` (`places_id`),
            KEY `users_id` (`users_id`),
            CONSTRAINT `places_followers_ibfk_1` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`) ON DELETE CASCADE,
            CONSTRAINT `places_followers_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
