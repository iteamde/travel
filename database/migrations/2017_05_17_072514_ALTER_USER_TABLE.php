<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ALTERUSERTABLE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function(Blueprint $table){
            $sql = 'ALTER TABLE `users`   
              CHANGE `username` `username` VARCHAR(256) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL  AFTER `name`,
              ADD COLUMN `sms` TINYINT(1) NULL AFTER `messages`;';
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
