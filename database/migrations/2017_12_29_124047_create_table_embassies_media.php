<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmbassiesMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_log', function(Blueprint $table) {
            $sql = "CREATE TABLE `embassies_media`(  
                  `id` INT(11),
                  `embassies_id` INT(11),
                  `medias_id` INT(11),
                  FOREIGN KEY (`embassies_id`) REFERENCES `embassies`(`id`) ON DELETE CASCADE,
                  FOREIGN KEY (`medias_id`) REFERENCES `medias`(`id`) ON DELETE CASCADE
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
