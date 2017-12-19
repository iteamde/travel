<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripplansTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('trips', function(Blueprint $table) {
            $sql = 'CREATE TABLE `trips` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `users_id` int(10) unsigned NOT NULL,
                    `title` varchar(255) NOT NULL,
                    `duration` int(11) NOT NULL,
                    `budget` int(11) NOT NULL,
                    `budget_currency` int(11) NOT NULL,
                    `distance` decimal(6,2) NOT NULL,
                    `num_places` int(11) NOT NULL,
                    `num_users` int(11) NOT NULL,
                    `start_date` date NOT NULL,
                    `end_date` date NOT NULL,
                    `created_at` datetime NOT NULL,
                    PRIMARY KEY (`id`),
                    KEY `users_id` (`users_id`),
                    CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
            DB::connection()->getPdo()->exec($sql);
        });
        Schema::table('trips_cities', function(Blueprint $table) {
            $sql = 'CREATE TABLE `trips_cities` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `trips_id` int(11) NOT NULL,
                    `cities_id` int(11) NOT NULL,
                    PRIMARY KEY (`id`),
                    KEY `trips_id` (`trips_id`),
                    KEY `cities_id` (`cities_id`),
                    CONSTRAINT `trips_cities_ibfk_1` FOREIGN KEY (`trips_id`) REFERENCES `trips` (`id`),
                    CONSTRAINT `trips_cities_ibfk_2` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
            DB::connection()->getPdo()->exec($sql);
        });
        Schema::table('trips_countries', function(Blueprint $table) {
            $sql = 'CREATE TABLE `trips_countries` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `trips_id` int(11) NOT NULL,
                    `countries_id` int(11) NOT NULL,
                    PRIMARY KEY (`id`),
                    KEY `trips_id` (`trips_id`),
                    KEY `countries_id` (`countries_id`),
                    CONSTRAINT `trips_countries_ibfk_1` FOREIGN KEY (`trips_id`) REFERENCES `trips` (`id`),
                    CONSTRAINT `trips_countries_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
            DB::connection()->getPdo()->exec($sql);
        });
        Schema::table('trips_places', function(Blueprint $table) {
            $sql = 'CREATE TABLE `trips_places` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `trips_id` int(11) NOT NULL,
                    `countries_id` int(11) NOT NULL,
                    `cities_id` int(11) NOT NULL,
                    `places_id` int(11) NOT NULL,
                    `time` datetime NOT NULL,
                    `duration` int(11) NOT NULL,
                    `budget` decimal(6,4) NOT NULL,
                    `weather` int(11) NOT NULL,
                    `comment` text NOT NULL,
                    PRIMARY KEY (`id`),
                    KEY `trips_id` (`trips_id`),
                    KEY `countries_id` (`countries_id`),
                    KEY `cities_id` (`cities_id`),
                    KEY `places_id` (`places_id`),
                    CONSTRAINT `trips_places_ibfk_1` FOREIGN KEY (`trips_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE,
                    CONSTRAINT `trips_places_ibfk_2` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
                    CONSTRAINT `trips_places_ibfk_3` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
                    CONSTRAINT `trips_places_ibfk_4` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
            DB::connection()->getPdo()->exec($sql);
        });
        Schema::table('trips_users', function(Blueprint $table) {
            $sql = 'CREATE TABLE `trips_users` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `trips_id` int(11) NOT NULL,
                    `users_id` int(10) unsigned NOT NULL,
                    PRIMARY KEY (`id`),
                    KEY `trips_id` (`trips_id`),
                    KEY `users_id` (`users_id`),
                    CONSTRAINT `trips_users_ibfk_1` FOREIGN KEY (`trips_id`) REFERENCES `trips` (`id`),
                    CONSTRAINT `trips_users_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
