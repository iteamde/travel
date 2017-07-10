<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersHiddenContent extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users_interests', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `users_hidden_content`;';
            DB::connection()->getPdo()->exec($sql);

            $sql = 'CREATE TABLE `users_hidden_content` (
                `id` int(11) NOT NULL,
                `users_id` int(11) NOT NULL,
                `content_id` int(11) NOT NULL,
                `content_type` int(11) NOT NULL,
                `created_at` datetime NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
              ALTER TABLE `users_hidden_content`
                ADD PRIMARY KEY (`id`),
                ADD KEY `users_id` (`users_id`);
              ALTER TABLE `users_hidden_content`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;';
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
