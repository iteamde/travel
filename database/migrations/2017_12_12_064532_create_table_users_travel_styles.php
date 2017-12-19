<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersTravelStyles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users_travel_styles', function(Blueprint $table) {
            $sql = 'CREATE TABLE `users_travel_styles` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `users_id` int(10) unsigned NOT NULL,
            `conf_lifestyles_id` int(11) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `users_id` (`users_id`),
            KEY `conf_lifestyles_id` (`conf_lifestyles_id`),
            CONSTRAINT `users_travel_styles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
            CONSTRAINT `users_travel_styles_ibfk_2` FOREIGN KEY (`conf_lifestyles_id`) REFERENCES `conf_lifestyles` (`id`) ON DELETE CASCADE
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
