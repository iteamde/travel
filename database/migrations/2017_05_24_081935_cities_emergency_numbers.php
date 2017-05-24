<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitiesEmergencyNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities_emergency_numbers', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `cities_emergency_numbers`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `cities_emergency_numbers` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `cities_id` int(11) NOT NULL,
              `emergency_numbers_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `cities_id` (`cities_id`),
              KEY `emergency_numbers_id` (`emergency_numbers_id`),
              CONSTRAINT `cities_emergency_numbers_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
              CONSTRAINT `cities_emergency_numbers_ibfk_2` FOREIGN KEY (`emergency_numbers_id`) REFERENCES `conf_emergency_numbers` (`id`)
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
