<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFriendRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_friend_requests', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `users_friend_requests`;
                CREATE TABLE `users_friend_requests` (
                  `id` int(11) NOT NULL,
                  `from` int(10) UNSIGNED NOT NULL,
                  `to` int(10) UNSIGNED NOT NULL,
                  `status` int(11) NOT NULL,
                  `created_at` datetime NOT NULL
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
