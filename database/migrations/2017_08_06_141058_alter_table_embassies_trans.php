<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEmbassiesTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('embassies_trans', function(Blueprint $table) {
            $sql = 'ALTER TABLE `embassies_trans`
              ADD COLUMN `address` VARCHAR(255) NULL AFTER `description`;
              ALTER TABLE `embassies_trans`
              ADD COLUMN `phone` VARCHAR(255) NULL AFTER `description`;
              ALTER TABLE `embassies_trans`
              ADD COLUMN `working_days` VARCHAR(255) NULL AFTER `description`;
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
