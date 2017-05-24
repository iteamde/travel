<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlacesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places_medias', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `places_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `places_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `places_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              `address` text NOT NULL,
              `phone` text NOT NULL,
              `highlights` text NOT NULL,
              `working_days` text NOT NULL,
              `working_times` text NOT NULL,
              `how_to_go` text NOT NULL,
              `when_to_go` text NOT NULL,
              `num_activities` text NOT NULL,
              `popularity` text NOT NULL,
              `conditions` text NOT NULL,
              `price_level` text NOT NULL,
              `num_checkins` text NOT NULL,
              `history` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `places_id` (`places_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `places_trans_ibfk_1` FOREIGN KEY (`places_id`) REFERENCES `places` (`id`),
              CONSTRAINT `places_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`)
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
