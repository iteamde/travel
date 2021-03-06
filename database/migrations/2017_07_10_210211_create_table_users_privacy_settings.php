<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersPrivacySettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_privacy_settings', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `users_privacy_settings`;';
            DB::connection()->getPdo()->exec($sql);

            $sql = 'CREATE TABLE `users_privacy_settings` (
                    `id` int(11) NOT NULL,
                    `users_id` int(11) NOT NULL,
                    `var` varchar(255) NOT NULL,
                    `val` varchar(255) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
              ALTER TABLE `users_privacy_settings`
                ADD PRIMARY KEY (`id`),
                ADD KEY `users_id` (`users_id`);
              ALTER TABLE `users_privacy_settings`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;';
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
