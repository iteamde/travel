<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePlacesAddPlaceType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function(Blueprint $table) {
            $sql = "ALTER TABLE `places` DROP FOREIGN KEY `places_ibfk_5`;"
                    . "ALTER TABLE `places` CHANGE `place_type_ids` `place_type` varchar(255) COLLATE 'utf8_general_ci' NULL AFTER `cities_id`;";
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
