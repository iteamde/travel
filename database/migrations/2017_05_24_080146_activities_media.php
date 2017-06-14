<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivitiesMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities_media', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `activities_media`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `activities_media` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `activities_id` int(11) NOT NULL,
                `medias_id` int(11) NOT NULL,
                PRIMARY KEY (`id`),
                KEY `activities_id` (`activities_id`),
                KEY `medias_id` (`medias_id`),
                CONSTRAINT `activities_media_ibfk_1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
                CONSTRAINT `activities_media_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE
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
