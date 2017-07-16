<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMediasHides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias_hides', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `medias_hides`;
                CREATE TABLE `medias_hides` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `medias_id` int(11) NOT NULL,
                  `users_id` int(10) unsigned NOT NULL,
                  `created_at` datetime NOT NULL,
                  PRIMARY KEY (`id`),
                  KEY `medias_id` (`medias_id`),
                  KEY `users_id` (`users_id`),
                  CONSTRAINT `medias_hides_ibfk_1` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`),
                  CONSTRAINT `medias_hides_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
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
