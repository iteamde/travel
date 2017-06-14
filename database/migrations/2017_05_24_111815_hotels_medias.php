<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels_medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `hotels_medias`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `hotels_medias` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `hotels_id` int(11) NOT NULL,
              `medias_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `hotels_id` (`hotels_id`),
              KEY `medias_id` (`medias_id`),
              CONSTRAINT `hotels_medias_ibfk_1` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
              CONSTRAINT `hotels_medias_ibfk_2` FOREIGN KEY (`medias_id`) REFERENCES `medias` (`id`) ON DELETE CASCADE
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
