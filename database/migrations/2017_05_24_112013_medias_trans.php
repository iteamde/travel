<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MediasTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medias_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `medias_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `medias_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `medias_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `medias_id` (`medias_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `medias_trans_ibfk_1` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE,
              CONSTRAINT `medias_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
