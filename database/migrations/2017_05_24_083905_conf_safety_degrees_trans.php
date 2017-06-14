<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfSafetyDegreesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_safety_degrees_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_safety_degrees_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_safety_degrees_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `safety_degrees_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `safety_degrees_id` (`safety_degrees_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_safety_degrees_trans_ibfk_1` FOREIGN KEY (`safety_degrees_id`) REFERENCES `conf_safety_degrees` (`id`) ON DELETE CASCADE,
              CONSTRAINT `conf_safety_degrees_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
