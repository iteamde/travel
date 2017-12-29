<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEmbassiesTransAddNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_log', function(Blueprint $table) {
            $sql = "ALTER TABLE `embassies_trans`   
                      ADD COLUMN `highlights` TEXT NULL AFTER `address`,
                      ADD COLUMN `working_times` TEXT NULL AFTER `highlights`,
                      ADD COLUMN `how_to_go` TEXT NULL AFTER `working_times`,
                      ADD COLUMN `when_to_go` TEXT NULL AFTER `how_to_go`,
                      ADD COLUMN `num_activities` TEXT NULL AFTER `when_to_go`,
                      ADD COLUMN `popularity` TEXT NULL AFTER `num_activities`,
                      ADD COLUMN `conditions` TEXT NULL AFTER `popularity`,
                      ADD COLUMN `price_level` TEXT NULL AFTER `conditions`,
                      ADD COLUMN `num_checkins` TEXT NULL AFTER `price_level`,
                      ADD COLUMN `history` TEXT NULL AFTER `num_checkins`;";
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
