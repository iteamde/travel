<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountriesWeekdays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries_weekdays', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `countries_weekdays`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `countries_weekdays` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `weekdays_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `weekdays_id` (`weekdays_id`),
              CONSTRAINT `countries_weekdays_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `countries_weekdays_ibfk_2` FOREIGN KEY (`weekdays_id`) REFERENCES `conf_weekdays` (`id`) ON DELETE CASCADE
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
