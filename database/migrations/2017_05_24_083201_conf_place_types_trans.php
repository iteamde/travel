<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfPlaceTypesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_place_types_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_place_types_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_place_types_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `place_types_ids` int(11) NOT NULL,
              `languages_ids` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `place_types_ids` (`place_types_ids`),
              KEY `languages_ids` (`languages_ids`),
              CONSTRAINT `conf_place_types_trans_ibfk_1` FOREIGN KEY (`place_types_ids`) REFERENCES `conf_place_types` (`id`) ON DELETE CASCADE,
              CONSTRAINT `conf_place_types_trans_ibfk_2` FOREIGN KEY (`languages_ids`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
