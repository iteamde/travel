<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `medias`';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `medias` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `url` varchar(255) NOT NULL,
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
