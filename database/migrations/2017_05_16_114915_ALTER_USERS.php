<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ALTERUSERS extends Migration
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
                ADD COLUMN `display_name` VARCHAR(256) NULL,
                ADD COLUMN `username` VARCHAR(256) NOT NULL,
                ADD COLUMN `address` LONGTEXT NULL AFTER `email`,
                ADD COLUMN `single` TINYINT(2) NULL AFTER `address`,
                ADD COLUMN `gender` TINYINT(2) NULL AFTER `single`,
                ADD COLUMN `children` INT(11) NULL AFTER `gender`,
                ADD COLUMN `age` INT(10) NULL AFTER `children`,
                ADD COLUMN `profile_picture` VARCHAR(256) NULL AFTER `age`,
                ADD COLUMN `mobile` VARCHAR(256) NULL AFTER `profile_picture`,
                ADD COLUMN `nationality` VARCHAR(256) NULL AFTER `status`,
                ADD COLUMN `public_profile` TINYINT(1) NULL AFTER `nationality`,
                ADD COLUMN `notifications` TINYINT(1) NULL AFTER `public_profile`,
                ADD COLUMN `messages` TINYINT(1) NULL AFTER `notifications`,
                    CHANGE `password` `password` VARCHAR(191) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci NULL  AFTER `messages`,
                ADD COLUMN `last_login` DATETIME NULL AFTER `deleted_at`,
                ADD COLUMN `travel_type` INT(10) NULL AFTER `last_login`;';
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
