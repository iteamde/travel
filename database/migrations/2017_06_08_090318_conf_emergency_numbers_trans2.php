<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfEmergencyNumbersTrans2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_emergency_numbers_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_emergency_numbers_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_emergency_numbers_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `emergency_numbers_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `emergency_numbers_id` (`emergency_numbers_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_emergency_numbers_trans_ibfk_1` FOREIGN KEY (`emergency_numbers_id`) REFERENCES `conf_emergency_numbers` (`id`),
              CONSTRAINT `conf_emergency_numbers_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`)
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
