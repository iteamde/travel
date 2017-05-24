<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContributorsCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contributors_cities', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `contributors_cities`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `contributors_cities` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `users_id` int(10) unsigned NOT NULL,
              `cities_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `users_id` (`users_id`),
              KEY `cities_id` (`cities_id`),
              CONSTRAINT `contributors_cities_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
              CONSTRAINT `contributors_cities_ibfk_2` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`)
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
