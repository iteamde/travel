<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountriesTimings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries_timings', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `countries_timings`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `countries_timings` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `timings_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `timings_id` (`timings_id`),
              CONSTRAINT `countries_timings_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `countries_timings_ibfk_2` FOREIGN KEY (`timings_id`) REFERENCES `conf_timings` (`id`) ON DELETE CASCADE
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
