<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountriesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `countries_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `countries_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              `nationality` varchar(255) NOT NULL,
              `population` varchar(255) NOT NULL,
              `best_place` text NOT NULL,
              `best_time` text NOT NULL,
              `cost_of_living` text NOT NULL,
              `geo_stats` text NOT NULL,
              `demographics` text NOT NULL,
              `economy` text NOT NULL,
              `suitable_for` text NOT NULL,
              `user_rating` int(11) NOT NULL,
              `num_cities` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `countries_trans_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `countries_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
