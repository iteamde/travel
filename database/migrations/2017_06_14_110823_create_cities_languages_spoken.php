<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesLanguagesSpoken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cities_languages_spoken', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `cities_languages_spoken`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `cities_languages_spoken` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `cities_id` int(11) NOT NULL,
              `languages_spoken_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `cities_id` (`cities_id`),
              KEY `languages_spoken_id` (`languages_spoken_id`),
              CONSTRAINT `cities_languages_spoken_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
              CONSTRAINT `cities_languages_spoken_ibfk_2` FOREIGN KEY (`languages_spoken_id`) REFERENCES `conf_languages_spoken` (`id`) ON DELETE CASCADE
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
