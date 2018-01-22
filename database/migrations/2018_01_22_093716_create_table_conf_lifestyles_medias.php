<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfLifestylesMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('conf_lifestyles_medias', function(Blueprint $table) {
            $sql = "CREATE TABLE `conf_lifestyles_medias`(  
                  `id` int(11),
                  `lifestyles_id` int(11),
                  `medias_id` int(11),
                  FOREIGN KEY (`lifestyles_id`) REFERENCES `conf_lifestyles`(`id`) ON DELETE CASCADE,
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
