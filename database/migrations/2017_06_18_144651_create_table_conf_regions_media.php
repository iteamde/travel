<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfRegionsMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('conf_regions_medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_regions_medias`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_regions_medias` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `regions_id` int(11) NOT NULL,
              `medias_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `regions_id` (`regions_id`),
              KEY `medias_id` (`medias_id`),
              CONSTRAINT `conf_regions_medias_ibfk_1` FOREIGN KEY (`regions_id`) REFERENCES `conf_regions` (`id`) ON DELETE CASCADE,
              CONSTRAINT `conf_regions_medias_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE
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
