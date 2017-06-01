<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTypesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conf_activities_types_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_activities_types_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_activities_types_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `activities_types_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `activities_types_id` (`activities_types_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_activities_types_trans_ibfk_1` FOREIGN KEY (`activities_types_id`) REFERENCES `conf_activities_types` (`id`),
              CONSTRAINT `conf_activities_types_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`)
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
