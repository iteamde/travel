<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfLevelsTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_levels_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_levels_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_levels_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `levels_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `levels_id` (`levels_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_levels_trans_ibfk_1` FOREIGN KEY (`levels_id`) REFERENCES `conf_levels` (`id`),
              CONSTRAINT `conf_levels_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`)
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
