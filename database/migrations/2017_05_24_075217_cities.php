<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('cities', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `cities`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `cities` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `code` int(11) NOT NULL,
              `lat` decimal(10,8) NOT NULL,
              `lng` decimal(11,8) NOT NULL,
              `is_capital` tinyint(4) NOT NULL,
              `safety_degree_id` int(11) NOT NULL,
              `active` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`)
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
