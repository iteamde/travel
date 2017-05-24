<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitiesCurrencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities_currencies', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `cities_currencies`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `cities_currencies` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `cities_id` int(11) NOT NULL,
              `currencies_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `cities_id` (`cities_id`),
              KEY `currencies_id` (`currencies_id`),
              CONSTRAINT `cities_currencies_ibfk_1` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`),
              CONSTRAINT `cities_currencies_ibfk_2` FOREIGN KEY (`currencies_id`) REFERENCES `conf_currencies` (`id`)
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
