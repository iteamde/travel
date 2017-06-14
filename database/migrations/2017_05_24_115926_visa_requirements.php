<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VisaRequirements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visa_requirements', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `visa_requirements`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `visa_requirements` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `from_countries_id` int(11) NOT NULL,
              `to_countries_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `from_countries_id` (`from_countries_id`),
              KEY `to_countries_id` (`to_countries_id`),
              CONSTRAINT `visa_requirements_ibfk_1` FOREIGN KEY (`from_countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
              CONSTRAINT `visa_requirements_ibfk_2` FOREIGN KEY (`to_countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
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
