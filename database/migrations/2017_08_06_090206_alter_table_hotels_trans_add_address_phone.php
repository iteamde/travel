<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableHotelsTransAddAddressPhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels_trans', function(Blueprint $table) {
            $sql = 'ALTER TABLE `hotels_trans`
              ADD COLUMN `address` VARCHAR(255) NULL AFTER `description`;
              ALTER TABLE `hotels_trans`
              ADD COLUMN `phone` VARCHAR(255) NULL AFTER `description`;
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
