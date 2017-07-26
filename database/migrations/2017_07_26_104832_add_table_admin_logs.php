<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableAdminLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_logs', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `admin_logs`;
                    CREATE TABLE `admin_logs` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `item_type` varchar(25) NOT NULL,
                      `item_id` int(11) NOT NULL,
                      `action` varchar(255) NOT NULL,
                      `time` varchar(255) NOT NULL,
                      `admin_id` int(10) unsigned NOT NULL,
                      PRIMARY KEY (`id`),
                      KEY `admin_id` (`admin_id`),
                      CONSTRAINT `admin_logs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
