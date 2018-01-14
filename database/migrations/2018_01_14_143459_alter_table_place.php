<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('places', function(Blueprint $table) {

            $sql = '
                ALTER TABLE `places` 
                add column `cover_media_id` int(11) NULL;
            ';
            DB::connection()->getPdo()->exec($sql);
            $sql = '
                ALTER TABLE `places`
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
