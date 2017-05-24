<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages_medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `pages_medias`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `pages_medias` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `pages_ids` int(11) NOT NULL,
              `medias_ids` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `pages_ids` (`pages_ids`),
              KEY `medias_ids` (`medias_ids`),
              CONSTRAINT `pages_medias_ibfk_1` FOREIGN KEY (`pages_ids`) REFERENCES `pages` (`id`),
              CONSTRAINT `pages_medias_ibfk_2` FOREIGN KEY (`medias_ids`) REFERENCES `medias` (`id`)
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
