<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfAgeRanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::table('conf_age_ranges', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_age_ranges`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_age_ranges` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `active` tinyint(4) NOT NULL,
              `from` varchar(20) NOT NULL,
              `to` varchar(20) NOT NULL,
              PRIMARY KEY (`id`)
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
