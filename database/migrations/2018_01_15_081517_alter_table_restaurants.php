<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('restaurants', function(Blueprint $table) {

            $sql = '
                ALTER TABLE `restaurants` 
                add column `cover_media_id` int(11) NULL;
            ';
            DB::connection()->getPdo()->exec($sql);
            $sql = '
                ALTER TABLE `restaurants`
                ADD FOREIGN KEY (`cover_media_id`) REFERENCES `medias`(`id`) ON DELETE SET NULL;
            ';
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
