<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountriesCurrencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries_currencies', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `countries_currencies`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `countries_currencies` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `countries_id` int(11) NOT NULL,
              `currencies_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `countries_id` (`countries_id`),
              KEY `currencies_id` (`currencies_id`),
              CONSTRAINT `countries_currencies_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
              CONSTRAINT `countries_currencies_ibfk_2` FOREIGN KEY (`currencies_id`) REFERENCES `conf_currencies` (`id`)
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
