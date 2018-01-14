<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCities2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cities', function(Blueprint $table) {

            $sql = '
                ALTER TABLE `cities` 
                add column `cover_media_id` int(11) NULL;
            ';
            DB::connection()->getPdo()->exec($sql);
            $sql = '
                ALTER TABLE `cities`
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
