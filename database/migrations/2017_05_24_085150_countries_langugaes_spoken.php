<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountriesLangugaesSpoken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries_langugaes_spoken', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `countries_langugaes_spoken`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `countries_langugaes_spoken` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `languages_spoken_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `languages_spoken_id` (`languages_spoken_id`),
              CONSTRAINT `countries_langugaes_spoken_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
              CONSTRAINT `countries_langugaes_spoken_ibfk_2` FOREIGN KEY (`languages_spoken_id`) REFERENCES `conf_languages_spoken` (`id`)
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
