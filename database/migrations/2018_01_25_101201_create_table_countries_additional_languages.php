<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCountriesAdditionalLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('countries_additional_languages', function(Blueprint $table) {
            $sql = "CREATE TABLE `countries_additional_languages`(  
                    `id` int(11) NOT NULL AUTO_INCREMENT , 
                    `countries_id` int(11) , 
                    `languages_spoken_id` int(11) ,
                    PRIMARY KEY (`id`), 
                    FOREIGN KEY (`countries_id`) REFERENCES `countries`(`id`) ON DELETE CASCADE,
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
