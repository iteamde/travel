<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCitiesAdditionalLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cities_additional_languages', function(Blueprint $table) {
            $sql = "CREATE TABLE `cities_additional_languages`(  
                    `id` int(11) NOT NULL AUTO_INCREMENT , 
                    `cities_id` int(11) , 
                    `languages_spoken_id` int(11) ,
                    PRIMARY KEY (`id`), 
                    FOREIGN KEY (`cities_id`) REFERENCES `cities`(`id`) ON DELETE CASCADE,
                    FOREIGN KEY (`languages_spoken_id`) REFERENCES `conf_languages_spoken`(`id`) ON DELETE CASCADE
                ) ENGINE=INNODB CHARSET=utf8 COLLATE=utf8_general_ci;";
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
