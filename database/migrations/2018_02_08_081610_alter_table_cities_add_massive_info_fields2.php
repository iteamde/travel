<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCitiesAddMassiveInfoFields2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function(Blueprint $table) {

            $sql = 'ALTER TABLE `cities_trans` ADD `metrics` TEXT NULL AFTER `suitable_for`, ADD `health_notes` TEXT NULL AFTER `metrics`, ADD `accommodation` TEXT NULL AFTER `health_notes`, ADD `potential_dangers` TEXT NULL AFTER `accommodation`, ADD `local_poisons` TEXT NULL AFTER `potential_dangers`, ADD `sockets` TEXT NULL AFTER `local_poisons`, ADD `working_days` TEXT NULL AFTER `sockets`, ADD `restrictions` TEXT NULL AFTER `working_days`, ADD `planning_tips` TEXT NULL AFTER `restrictions`, ADD `other` TEXT NULL AFTER `planning_tips`, ADD `internet` TEXT NULL AFTER `other`, ADD `speed_limit` TEXT NULL AFTER `internet`, ADD `etiquette` TEXT NULL AFTER `speed_limit`, ADD `pollution_index` TEXT NULL AFTER `etiquette`, ADD `transportation` TEXT NULL AFTER `pollution_index`, ADD `highlights` TEXT NULL AFTER `transportation`;';
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
