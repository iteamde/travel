<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableLifestyleMedias extends Migration
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
            $sql = '
                TRUNCATE TABLE `conf_lifestyles_medias`;
            ';
            DB::connection()->getPdo()->exec($sql);
            $sql = '
                ALTER TABLE `conf_lifestyles_medias` ADD PRIMARY KEY (`id`);
            ';
            DB::connection()->getPdo()->exec($sql);
            $sql = '
                ALTER TABLE `conf_lifestyles_medias` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
