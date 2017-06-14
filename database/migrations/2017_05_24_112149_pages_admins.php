<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages_admins', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `pages_admins`;';
            DB::connection()->getPdo()->exec($sql);
            
            $sql = 'CREATE TABLE `pages_admins` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `pages_id` int(11) NOT NULL,
              `users_id` int(10) unsigned NOT NULL,
              PRIMARY KEY (`id`),
              KEY `pages_id` (`pages_id`),
              KEY `users_id` (`users_id`),
              CONSTRAINT `pages_admins_ibfk_1` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
              CONSTRAINT `pages_admins_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
