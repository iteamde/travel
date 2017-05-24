<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `reviews`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `reviews` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `cities_id` int(11) NOT NULL,
              `countries_id` int(11) NOT NULL,
              `embassies_id` int(11) NOT NULL,
              `medias_id` int(11) NOT NULL,
              `pages_id` int(11) NOT NULL,
              `places_id` int(11) NOT NULL,
              `users_id` int(10) unsigned NOT NULL,
              `by_users_id` int(10) unsigned NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              `active` tinyint(4) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `cities_id` (`cities_id`),
              KEY `countries_id` (`countries_id`),
              KEY `embassies_id` (`embassies_id`),
              KEY `medias_id` (`medias_id`),
              KEY `pages_id` (`pages_id`),
              KEY `places_id` (`places_id`),
              KEY `users_id` (`users_id`),
              KEY `by_users_id` (`by_users_id`),
              CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
              CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
              CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`embassies_id`) REFERENCES `embassies` (`id`),
              CONSTRAINT `reviews_ibfk_4` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`),
              CONSTRAINT `reviews_ibfk_5` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`),
              CONSTRAINT `reviews_ibfk_6` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`),
              CONSTRAINT `reviews_ibfk_7` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
              CONSTRAINT `reviews_ibfk_8` FOREIGN KEY (`by_users_id`) REFERENCES `users` (`id`)
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
