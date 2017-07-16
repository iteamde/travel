<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersFriendRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_blocks', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `users_blocks`;
            CREATE TABLE `users_blocks` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `users_id` int(10) unsigned NOT NULL,
              `blocks_id` int(10) unsigned NOT NULL,
              PRIMARY KEY (`id`),
              KEY `users_id` (`users_id`),
              KEY `blocks_id` (`blocks_id`),
              CONSTRAINT `users_blocks_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
              CONSTRAINT `users_blocks_ibfk_2` FOREIGN KEY (`blocks_id`) REFERENCES `users` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
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
