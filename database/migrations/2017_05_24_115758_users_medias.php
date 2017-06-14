<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `users_medias`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `users_medias` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `users_id` int(10) unsigned NOT NULL,
              `medias_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `users_id` (`users_id`),
              KEY `medias_id` (`medias_id`),
              CONSTRAINT `users_medias_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
              CONSTRAINT `users_medias_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE
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
