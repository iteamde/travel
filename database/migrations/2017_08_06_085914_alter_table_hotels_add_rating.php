<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableHotelsAddRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function(Blueprint $table) {
            $sql = 'ALTER TABLE `hotels`
              ADD COLUMN `rating` decimal(2,1) NULL AFTER `lng`;
              ALTER TABLE `hotels`
              ADD COLUMN `provider_id` varchar(255) NULL AFTER `lng`;
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
