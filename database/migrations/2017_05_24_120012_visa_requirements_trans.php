<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisaRequirementsTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visa_requirements_trans', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `visa_requirements_trans`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `visa_requirements_trans` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `visa_requirements_ids` int(11) NOT NULL,
              `languages_ids` int(11) NOT NULL,
              `title` varchar(255) NOT NULL,
              `description` text NOT NULL,
              PRIMARY KEY (`id`),
              KEY `visa_requirements_ids` (`visa_requirements_ids`),
              KEY `languages_ids` (`languages_ids`),
              CONSTRAINT `visa_requirements_trans_ibfk_1` FOREIGN KEY (`visa_requirements_ids`) REFERENCES `visa_requirements` (`id`),
              CONSTRAINT `visa_requirements_trans_ibfk_2` FOREIGN KEY (`languages_ids`) REFERENCES `conf_languages` (`id`)
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
