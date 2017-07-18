<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePagesNotificationsSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages_notification_settings', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `pages_notification_settings`;
                CREATE TABLE `pages_notification_settings` (
                  `id` int(11) NOT NULL,
                  `pages_id` int(11) NOT NULL,
                  `var` varchar(255) NOT NULL,
                  `val` varchar(255) NOT NULL,
                  KEY `pages_id` (`pages_id`),
                  CONSTRAINT `pages_notification_settings_ibfk_1` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`)
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
