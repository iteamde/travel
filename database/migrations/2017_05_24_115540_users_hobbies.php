<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersHobbies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_hobbies', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `users_hobbies`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `users_hobbies` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `users_id` int(10) unsigned NOT NULL,
              `hobbies_id` int(11) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `users_id` (`users_id`),
              KEY `hobbies_id` (`hobbies_id`),
              CONSTRAINT `users_hobbies_ibfk_1` FOREIGN KEY (`hobbies_id`) REFERENCES `conf_hobbies` (`id`) ON DELETE CASCADE,
              CONSTRAINT `users_hobbies_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
