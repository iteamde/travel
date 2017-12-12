<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCitiesFollowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities_followers', function(Blueprint $table) {
            $sql = 'CREATE TABLE `cities_followers` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `cities_id` int(11) NOT NULL,
        `users_id` int(10) unsigned NOT NULL,
        PRIMARY KEY (`id`),
        KEY `cities_id` (`cities_id`),
        KEY `users_id` (`users_id`),
        CONSTRAINT `cities_followers_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
        CONSTRAINT `cities_followers_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
