<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMediasComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias_comments', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `medias_comments`;
                CREATE TABLE `medias_comments` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `medias_id` int(11) NOT NULL,
                  `users_id` int(10) unsigned NOT NULL,
                  `reply_to` int(10) unsigned NOT NULL,
                  `comment` text NOT NULL,
                  `created_at` datetime NOT NULL,
                  PRIMARY KEY (`id`),
                  KEY `users_id` (`users_id`),
                  KEY `medias_id` (`medias_id`),
                  CONSTRAINT `medias_comments_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`)
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
