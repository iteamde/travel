<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCitiesAirportsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities_airports', function(Blueprint $table) {
            
            $sql = 'ALTER TABLE `cities_airports` DROP FOREIGN KEY `cities_airports_ibfk_1`';
            DB::connection()->getPdo()->exec($sql);

            $sql = 'ALTER TABLE `cities_airports` ADD FOREIGN KEY (`cities_id`) REFERENCES `cities`(`id`) ON DELETE CASCADE;';
            DB::connection()->getPdo()->exec($sql);

            $sql = 'ALTER TABLE `cities_airports` DROP FOREIGN KEY `cities_airports_ibfk_2`';
            DB::connection()->getPdo()->exec($sql);

            $sql = 'ALTER TABLE `cities_airports` ADD FOREIGN KEY (`places_id`) REFERENCES `places`(`id`) ON DELETE CASCADE;';
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
