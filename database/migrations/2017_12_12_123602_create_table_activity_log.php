<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActivityLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_log', function(Blueprint $table) {
            $sql = 'CREATE TABLE `activity_log` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `users_id` int(10) unsigned NOT NULL,
                `type` varchar(255) NOT NULL,
                `action` varchar(255) NOT NULL,
                `time` datetime NOT NULL,
                `permission` tinyint(4) NOT NULL,
                PRIMARY KEY (`id`),
                KEY `users_id` (`users_id`),
                CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
