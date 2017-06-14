<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfHobbiesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_hobbies_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_hobbies_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_hobbies_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `hobbies_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `hobbies_id` (`hobbies_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_hobbies_trans_ibfk_1` FOREIGN KEY (`hobbies_id`) REFERENCES `conf_hobbies` (`id`) ON DELETE CASCADE,
              CONSTRAINT `conf_hobbies_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
