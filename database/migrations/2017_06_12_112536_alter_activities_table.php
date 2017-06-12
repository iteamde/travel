<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('activities', function(Blueprint $table) {
            
            $sql = 'ALTER TABLE `activities` DROP FOREIGN KEY `activities_ibfk_4`';
            DB::connection()->getPdo()->exec($sql);

            $sql = 'ALTER TABLE `activities` ADD FOREIGN KEY (`places_id`) REFERENCES `places`(`id`) ON DELETE CASCADE;';
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
