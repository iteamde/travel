<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfAgeRangesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('conf_age_ranges_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `conf_age_ranges_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `conf_age_ranges_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `age_ranges_id` int(11) NOT NULL,
              `languages_id` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `age_ranges_id` (`age_ranges_id`),
              KEY `languages_id` (`languages_id`),
              CONSTRAINT `conf_age_ranges_trans_ibfk_1` FOREIGN KEY (`age_ranges_id`) REFERENCES `conf_age_ranges` (`id`) ON DELETE CASCADE,
              CONSTRAINT `conf_age_ranges_trans_ibfk_2` FOREIGN KEY (`languages_id`) REFERENCES `conf_languages` (`id`) ON DELETE CASCADE
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
