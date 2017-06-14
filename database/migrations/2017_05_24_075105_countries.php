<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Countries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `countries`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `countries` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `regions_id` int(11) NOT NULL,
              `code` varchar(3) NOT NULL,
              `lat` decimal(10,8) NOT NULL,
              `lng` decimal(11,8) NOT NULL,
              `safety_degree_id` int(11) NOT NULL,
              `active` tinyint(4) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `regions_id` (`regions_id`),
              KEY `safety_degree_id` (`safety_degree_id`),
              CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`regions_id`) REFERENCES `conf_regions` (`id`) ON DELETE CASCADE,
              CONSTRAINT `countries_ibfk_2` FOREIGN KEY (`safety_degree_id`) REFERENCES `conf_safety_degrees` (`id`) ON DELETE CASCADE
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
