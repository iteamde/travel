<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestaurantsTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `restaurants_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `restaurants_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `restaurants_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              `working_days` text NOT NULL,
              `working_times` text NOT NULL,
              `how_to_go` text NOT NULL,
              `when_to_go` text NOT NULL,
              `num_activities` text NOT NULL,
              `popularity` text NOT NULL,
              `conditions` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `restaurants_id` (`restaurants_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `restaurants_trans_ibfk_1` FOREIGN KEY (`restaurants_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
              CONSTRAINT `restaurants_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
