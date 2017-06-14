<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountriesHolidays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries_holidays', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `countries_holidays`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `countries_holidays` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `holidays_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `holidays_id` (`holidays_id`),
              CONSTRAINT `countries_holidays_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `countries_holidays_ibfk_2` FOREIGN KEY (`holidays_id`) REFERENCES `conf_holidays` (`id`) ON DELETE CASCADE
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
