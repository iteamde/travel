<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMediasLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias_likes', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `medias_likes`;
                    CREATE TABLE `medias_likes` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `users_id` int(10) unsigned NOT NULL,
                      `medias_id` int(11) NOT NULL,
                      `created_at` datetime NOT NULL,
                      PRIMARY KEY (`id`),
                      KEY `users_id` (`users_id`),
                      KEY `medias_id` (`medias_id`),
                      CONSTRAINT `medias_likes_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
                      CONSTRAINT `medias_likes_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`)
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
