<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCountriesFollowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places_comments', function(Blueprint $table) {
            $sql = 'CREATE TABLE `countries_followers` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `countries_id` int(11) NOT NULL,
                `users_id` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id`),
                KEY `countries_id` (`countries_id`),
                KEY `users_id` (`users_id`),
                CONSTRAINT `countries_followers_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
                CONSTRAINT `countries_followers_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
