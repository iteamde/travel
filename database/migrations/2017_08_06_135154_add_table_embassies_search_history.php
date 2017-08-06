<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableEmbassiesSearchHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('embassies_search_history', function(Blueprint $table) {
            $sql = 'DROP TABLE IF EXISTS `embassies_search_history`;
                CREATE TABLE `embassies_search_history` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `admin_id` int(10) unsigned NOT NULL,
                  `lat` decimal(10,8) NOT NULL,
                  `lng` decimal(11,8) NOT NULL,
                  `time` varchar(255) NOT NULL,
                  PRIMARY KEY (`id`),
                  KEY `admin_id` (`admin_id`),
                  CONSTRAINT `embassies_search_history_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`)
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
