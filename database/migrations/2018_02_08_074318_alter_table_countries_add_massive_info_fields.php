<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCountriesAddMassiveInfoFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('countries', function(Blueprint $table) {

            $sql = 'ALTER TABLE `countries_trans` ADD `metrics` TEXT NOT NULL AFTER `num_cities`, ADD `sockets` TEXT NOT NULL AFTER `metrics`, ADD `working_days` TEXT NOT NULL AFTER `sockets`, ADD `internet` TEXT NOT NULL AFTER `working_days`, ADD `other` TEXT NOT NULL AFTER `internet`, ADD `highlights` TEXT NOT NULL AFTER `other`, ADD `health_notes` TEXT NOT NULL AFTER `highlights`, ADD `accommodation` TEXT NOT NULL AFTER `health_notes`, ADD `potential_dangers` TEXT NOT NULL AFTER `accommodation`, ADD `local_poisons` TEXT NOT NULL AFTER `potential_dangers`, ADD `speed_limit` TEXT NOT NULL AFTER `local_poisons`, ADD `etiquette` TEXT NOT NULL AFTER `speed_limit`, ADD `pollution_index` TEXT NOT NULL AFTER `etiquette`, ADD `transportation` TEXT NOT NULL AFTER `pollution_index`, ADD `planning_tips` TEXT NOT NULL AFTER `transportation`;';
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
