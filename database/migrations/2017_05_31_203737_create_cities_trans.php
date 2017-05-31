<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cities_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `cities_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `cities_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `cities_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              `best_place` text NOT NULL,
              `best_time` text NOT NULL,
              `cost_of_living` text NOT NULL,
              `geo_stats` text NOT NULL,
              `demographics` text NOT NULL,
              `economy` text NOT NULL,
              `suitable_for` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `cities_id` (`cities_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `cities_trans_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
              CONSTRAINT `cities_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`)
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
