<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfAccommodationsTrans2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('conf_accommodations_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_accommodations_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_accommodations_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `accommodations_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `accommodations_id` (`accommodations_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_accommodations_trans_ibfk_1` FOREIGN KEY (`accommodations_id`) REFERENCES `conf_accommodations` (`id`) ON DELETE CASCADE,
              CONSTRAINT `conf_accommodations_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
